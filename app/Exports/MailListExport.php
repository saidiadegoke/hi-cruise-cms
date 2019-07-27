<?php
namespace App\Exports;

use App\Models\SubscriptionList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class MailListExport implements FromCollection
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
        //return SubscriptionList::all();
        $emaillist = SubscriptionList::orderBy('updated_at', 'desc');
        if($this->from) {
            $from = Carbon::createFromDate($this->from)->toDateTimeString();
            $emaillist->where('updated_at' , '>=', $from);
        }
        if($this->to) {
            $to = Carbon::createFromDate($this->to)->toDateTimeString();
            $emaillist->where('updated_at' , '<=', $to);
        }
        if($this->q) {
            $emaillist->orWhere('email' , 'LIKE', '%'.$this->q.'%');
        }

        return $emaillist->get();
    }
}