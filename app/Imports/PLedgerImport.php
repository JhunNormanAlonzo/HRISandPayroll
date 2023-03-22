<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Period;
use App\Models\PLedger;
use App\Models\WDRef;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PLedgerImport implements ToModel, WithHeadingRow
{

//    public function model(array $row)
//    {
//
//
//        $period = Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))
//            ->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'));
////        $wd_id = WDRef::where('wd_id', $row['wd_id']);
//        $employee = Employee::where('emp_ctrl', $row['emp_ctrl']);
//
//        return new PLedger([
//            "pdate" => Carbon::parse(Date::excelToDateTimeObject($row['pdate']))->format('Y-m-d H:i:s'),
//            "period" => $period->exists() ? $period->pluck('period')->first() : null,
//            "wd_id" =>  $row['wd_id'],
////            "emp_ctrl" => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
//            "emp_ctrl" =>  $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "0000",
//            "qty" => $row['qty'],
//            "rate" => $row['rate'],
//            "amount" => $row['amount'],
//        ]);
//    }




    public function model(array $row)
    {
        $employee = Employee::where('emp_name', $row['emp_ctrl']);


        return [
            new PLedger([
                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
                'wd_id' => 'sss',
                'amount' => (int)$row['sss'],
                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
            ]),
            new PLedger([
                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
                'wd_id' => 'pagibig',
                'amount' => (int)$row['pagibig'],
                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
            ]),

            new PLedger([
                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
                'wd_id' => 'philhealth',
                'amount' => (int)$row['philhealth'],
                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
            ])

        ];
    }

    public function headingRow(): int
    {
        return 1;
    }


}
