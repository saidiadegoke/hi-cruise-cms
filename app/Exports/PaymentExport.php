<?php
namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\PrintPayment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $from;
    protected $to;
    protected $q;

    public function __construct($from, $to, $q) {
        $this->from = $from;
        $this->to = $to;
        $this->q = $q;
    }

    public function headings(): array
    {
        return ["Customer", "Package Name", "Cruise Date", "Payment Date", "Payment Method", "Amount", "Status", "No of Seats"];
    }

    public function collection()
    {
        $data = $this;
        
        $payments = Payment::whereHas('reservation', function(Builder $query) use ($data) {
            if($data->from) {
                $from = Carbon::createFromDate($data->from)->toDateTimeString();
                $query->where('start_date' , '>=', $from);
            }
            if($data->to) {
                $to = Carbon::createFromDate($data->to)->toDateTimeString();
                $query->where('start_date' , '<=', $to);
            }
        })->orderBy('updated_at', 'desc');

        /*if($this->from) {
            $from = Carbon::createFromDate($this->from)->toDateTimeString();
            $payments->where('updated_at' , '>=', $from);
        }
        if($this->to) {
            $to = Carbon::createFromDate($this->to)->toDateTimeString();
            $payments->where('updated_at' , '<=', $to);
        } */

        $payments = $payments->get();
        $result = [];
        foreach($payments as $payment) {
            $result[] = [
                'customer' => $payment->reservation? $payment->reservation->name: '',
                'package_name' => $payment->reservation && $payment->reservation->package? $payment->reservation->package->name: 'N/a',
                'cruise_date' => $payment->reservation && $payment->reservation->start_date? date('d F, Y', strtotime($payment->reservation->start_date)): 'N/a',
                'payment_date' => date('d F, Y', strtotime($payment->created_at)),
                'payment_method' => !$payment->payable_type? 'N/a': stripos($payment->payable_type, 'Offline')? 'Offline': 'Online',
                'amount' => "₦ " . number_format($payment->amount, 2),
                'status' => $payment->status == 1? 'Successful': 'Failed',
                'seats' => $payment->reservation ? $payment->reservation->seats: 'N/a'
            ];
        }

        return collect($result);
    }
}