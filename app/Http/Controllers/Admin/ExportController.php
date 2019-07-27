<?php
use App\Exports\UsersExport;
use Maatwebsite\Excel\Excel;

class ExportController
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    
    public function exportViaConstructorInjection()
    {
        return $this->excel->download(new UsersExport, 'list.xlsx');
    }
    
    public function exportViaMethodInjection(Excel $excel)
    {
        return $excel->download(new UsersExport, 'list.xlsx');
    }
}