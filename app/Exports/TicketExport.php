<?php
namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class TicketExport implements FromCollection
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
        $reservations = Reservation::with('customer')->where('used', 1)->orderBy('updated_at', 'desc');
        if($this->from) {
            $from = Carbon::createFromDate($this->from)->toDateTimeString();
            $reservations->where('updated_at' , '>=', $from);
        }
        if($this->to) {
            $to = Carbon::createFromDate($this->to)->toDateTimeString();
            $reservations->where('updated_at' , '<=', $to);
        }
        if($this->q) {
            $reservations->orWhere('reference' , 'LIKE', '%'.$this->q.'%');
        }

        $reservations = $reservations->get();
        $result = [];
        foreach($reservations as $reservation) {
        	$result[] = [
        		'name' => $reservation->name,
        		'email' => $reservation->email,
        		'phone' => $reservation->phone,
        		'address' => $reservation->address,
        		'package_name' => $reservation->package? $reservation->package->name: '',
        		'package_description' => $reservation->package? $reservation->package->description: '',
        		'date' => date('d F, Y', strtotime($reservation->updated_at)),
        		'payment_made' => $reservation->payment? 'Yes': 'No',
        		'amount' => $reservation->payment? "&#8358; " . number_format($reservation->payment->amount, 2): 'N/a'
        	];
        }

        return $reservations;
    }
}