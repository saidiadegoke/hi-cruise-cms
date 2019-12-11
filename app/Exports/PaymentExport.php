<?php
namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class PaymentExport implements FromCollection
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

    public function collection()
    {
        $payments = Payment::orderBy('updated_at', 'desc');
        if($this->from) {
            $from = Carbon::createFromDate($this->from)->toDateTimeString();
            $payments->where('updated_at' , '>=', $from);
        }
        if($this->to) {
            $to = Carbon::createFromDate($this->to)->toDateTimeString();
            $payments->where('updated_at' , '<=', $to);
        }

        $payments = $payments->get();
        $result = [];
        foreach($payments as $payment) {
        	$result[] = [
        		'customer' => $payment->reservation? $payment->reservation->name: '',
        		'package_name' => $payment->reservation && $payment->reservation->package? $payment->reservation->package->name: 'N/a',
        		'package_description' => $payment->reservation && $payment->reservation->package? $payment->reservation->package->description: 'N/a',
        		'date' => date('d F, Y', strtotime($payment->created_at)),
        		'payment_made' => $payment->payment? 'Yes': 'No',
        		'amount' => "&#8358; " . number_format($payment->amount, 2),
                'status' => $payment->status == 1? 'Successful': 'Failed'
        	];
        }

        return $payments;
    }
}