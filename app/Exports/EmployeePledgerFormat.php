<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Period;
use App\Models\WdRef;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeePledgerFormat implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Employee::query()
            ->select(['emp_dept', 'emp_ctrl', 'emp_name'])->get();
    }

    public function headings(): array{
        $wd_ref = WdRef::all();
        $cols = [
            'emp_dept',
            'emp_ctrl',
            'emp_name',
            'pfrom',
            'pto',
            'pdate',
        ];
        foreach ($wd_ref as $wr){
            array_push($cols, $wr->wd_desc);
        }

        return [
            $cols
        ];
    }
}
