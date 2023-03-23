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

//        $period = Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
//            ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->first();

//        $wd_ref = array(
//            "SSS",
//            "WTAX",
//            "BASIC SALARY",
//            "REGULAR OVERTIME",
//            "PHILHEALTH",
//            "PAG-IBIG",
//            "CASH ADVANCES",
//            "SSS LOAN",
//            "PAG IBIG LOAN",
//            "OVERPAYMENT",
//            "ABSENCES",
//            "BONUS 13th MONTH",
//            "RICE ALLOWANCE",
//            "REPRESENTATION ALLOWANCE",
//            "MEDICAL ALLOWANCE",
//            "CLOTHING ALLOWANCE",
//            "SUBSISTENCE ALLOWANCE",
//            "MEAL ALLOWANCE",
//            "SAMAKO",
//            "ABULOY",
//            "POWER BILLS",
//            "RB ALICIA LOAN",
//            "ETEEAP",
//            "WTAX OT",
//            "GLOBE PLAN",
//            "ONE EC MCO",
//            "MAXICARE",
//            "INSULAR LIFE",
//            "COCOLIFE",
//            "ADVANCES",
//            "SAMAKO LOAN",
//            "WITHOLDING TAX",
//            "TOKEN",
//            "SAMAKO DUES",
//            "PHILAM PLANS",
//            "ISELCO1 CANTEEN",
//            "DBP LOAN",
//            "IEMPC",
//            "ST PETER LIFE PLAN",
//            "LINEMAN DUES",
//            "LATE",
//            "UNDERTIME",
//            "ALLOWANCE",
//            "OTHERS 143",
//            "ETAAP PROG",
//            "PHILAM PLAN",
//            "AXA",
//            "RB SAN AGUSTIN",
//            "OT/NSDIFF",
//            "CARE HEALTH",
//            "SALARY DIFFRENTIAL",
//            "INSURANCE",
//            "SICK LEAVE",
//            "S-CANTEEN",
//            "GEN MERC",
//            "KIOSK",
//            "FACILITY SERVICE",
//            "PARAMOUNT PLUS HMO",
//            "FWD LIFE INSURANCE",
//            "ADVC CHARGE TO BENEFIT",
//            "IIEE MO DUES",
//            "Over/Under Yearend Tax Ad",
//            "MONTHLY DEFERRED TAX",
//            "HUNTER"
//        );
//
//    public function model(array $row)
//    {
//        $employee = Employee::where('emp_ctrl', $row['emp_ctrl'])->first();
//
//        $wd_ref = WDRef::select('wd_desc', 'wd_id')->get();
//
//        $row = array_map(function ($value) {
//            return str_replace('_', ' ', $value);
//        }, $row);
//
//        return $wd_ref->map(function ($wd) use ($row, $employee) {
//
//            return new PLedger([
//                'emp_ctrl' => $employee ? $employee->emp_ctrl : "00000",
//                'wd_id' => $wd->wd_id,
//                'amount' => $row[$wd->wd_desc],
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
//                    ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
//                    ->first(),
//            ]);
//        })->toArray();
//    }
//legit
//    public function model(array $row)
//end

    public function model(array $row)
    {
        $wd_ref = array(
            "SSS",
            "WTAX",
            "BASIC SALARY",
            "REGULAR OVERTIME",
            "PHILHEALTH",
            "PAG IBIG",
            "CASH ADVANCES",
            "SSS LOAN",
            "PAG IBIG LOAN",
            "OVERPAYMENT",
            "ABSENCES",
            "BONUS 13th MONTH",
            "RICE ALLOWANCE",
            "REPRESENTATION ALLOWANCE",
            "MEDICAL ALLOWANCE",
            "CLOTHING ALLOWANCE",
            "SUBSISTENCE ALLOWANCE",
            "MEAL ALLOWANCE",
            "SAMAKO",
            "ABULOY",
            "POWER BILLS",
            "RB ALICIA LOAN",
            "ETEEAP",
            "WTAX OT",
            "GLOBE PLAN",
            "ONE EC MCO",
            "MAXICARE",
            "INSULAR LIFE",
            "COCOLIFE",
            "ADVANCES",
            "SAMAKO LOAN",
            "WITHOLDING TAX",
            "TOKEN",
            "SAMAKO DUES",
            "PHILAM PLANS",
            "ISELCO1 CANTEEN",
            "DBP LOAN",
            "IEMPC",
            "ST PETER LIFE PLAN",
            "LINEMAN DUES",
            "LATE",
            "UNDERTIME",
            "ALLOWANCE",
            "OTHERS 143",
            "ETAAP PROG",
            "PHILAM PLAN",
            "AXA",
            "RB SAN AGUSTIN",
            "OT NSDIFF",
            "CARE HEALTH",
            "SALARY DIFFRENTIAL",
            "INSURANCE",
            "SICK LEAVE",
            "S CANTEEN",
            "GEN MERC",
            "KIOSK",
            "FACILITY SERVICE",
            "PARAMOUNT PLUS HMO",
            "FWD LIFE INSURANCE",
            "ADVC CHARGE TO BENEFIT",
            "IIEE MO DUES",
            "Over Under Yearend Tax Ad",
            "MONTHLY DEFERRED TAX",
            "HUNTER"
        );

        $employee = Employee::where('emp_name', $row['emp_ctrl']);

        $period = Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
            ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
            ->first();
        $pLedgers = array();

        foreach ($wd_ref as $wd_desc) {
            if (isset($row[strtolower(str_replace(' ', '_', $wd_desc))])){
                $pLedgers[] = new PLedger([
                    'emp_ctrl' => isset($row['emp_ctrl']) ? $row['emp_ctrl'] : "00000",
                    'wd_id' => WDRef::where('wd_desc', $wd_desc)->pluck('wd_id')->first(),
                    'amount' => $row[strtolower(str_replace(' ', '_', $wd_desc))],
                    'rate' => $row[strtolower(str_replace(' ', '_', $wd_desc))],
                    'qty' => '1.0',
                    'pdate' => Date::excelToDateTimeObject($row['pto']),
                    'period' => $period,
                ]);
            }


        }

        return $pLedgers;

    }


//    {
//        $employee = Employee::where('emp_ctrl', $row['emp_ctrl'])->first();
//
//        $wd_ref = WDRef::where('wd_desc', $row['wd_'])
//
//        // iterate through the $row array and replace underscores with spaces
//
//
//        return [
//            new PLedger([
//                'emp_ctrl' => $employee ? $employee->emp_ctrl : "00000",
//                'wd_id' => $wd->wd_id,
//                'amount' => strtoupper($row[$wd->wd_desc]),
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
//                    ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
//                    ->first(),
//            ]),
//        ];
//
//
//    }
////
//    public function model(array $row)
//    {
//        $wd_ref = array(
//            "SSS",
//            "WTAX",
//            "BASIC SALARY",
//            "REGULAR OVERTIME",
//            "PHILHEALTH",
//            "PAG-IBIG",
//            "CASH ADVANCES",
//            "SSS LOAN",
//            "PAG IBIG LOAN",
//            "OVERPAYMENT",
//            "ABSENCES",
//            "BONUS 13th MONTH",
//            "RICE ALLOWANCE",
//            "REPRESENTATION ALLOWANCE",
//            "MEDICAL ALLOWANCE",
//            "CLOTHING ALLOWANCE",
//            "SUBSISTENCE ALLOWANCE",
//            "MEAL ALLOWANCE",
//            "SAMAKO",
//            "ABULOY",
//            "POWER BILLS",
//            "RB ALICIA LOAN",
//            "ETEEAP",
//            "WTAX OT",
//            "GLOBE PLAN",
//            "ONE EC MCO",
//            "MAXICARE",
//            "INSULAR LIFE",
//            "COCOLIFE",
//            "ADVANCES",
//            "SAMAKO LOAN",
//            "WITHOLDING TAX",
//            "TOKEN",
//            "SAMAKO DUES",
//            "PHILAM PLANS",
//            "ISELCO1 CANTEEN",
//            "DBP LOAN",
//            "IEMPC",
//            "ST PETER LIFE PLAN",
//            "LINEMAN DUES",
//            "LATE",
//            "UNDERTIME",
//            "ALLOWANCE",
//            "OTHERS 143",
//            "ETAAP PROG",
//            "PHILAM PLAN",
//            "AXA",
//            "RB SAN AGUSTIN",
//            "OT/NSDIFF",
//            "CARE HEALTH",
//            "SALARY DIFFRENTIAL",
//            "INSURANCE",
//            "SICK LEAVE",
//            "S-CANTEEN",
//            "GEN MERC",
//            "KIOSK",
//            "FACILITY SERVICE",
//            "PARAMOUNT PLUS HMO",
//            "FWD LIFE INSURANCE",
//            "ADVC CHARGE TO BENEFIT",
//            "IIEE MO DUES",
//            "Over/Under Yearend Tax Ad",
//            "MONTHLY DEFERRED TAX",
//            "HUNTER"
//        );
//
//        $employee = Employee::where('emp_ctrl', $row['emp_ctrl'])->first();
//
//
//        $period = Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
//            ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
//            ->first();
//        return [
//            new PLedger([
//                'emp_ctrl' => $employee ? $employee->emp_ctrl : "00000",
//                'wd_id' => WDRef::where('wd_desc', 'SSS')->pluck('wd_id')->first(),
//                'amount' => $row['sss'],
//                'period' => $period,
//            ]),
//        ];
//
//    }

//        $result = [];
//        $count = 5;
//        foreach ($wd_ref as $wd) {
//
//            if ($row[$keys[$count]] !== null){
//                $result[] = new PLedger([
//                    'emp_ctrl' => $employee ? $employee->emp_ctrl : "00000",
//                    'wd_id' => $wd->wd_id,
//                    'amount' => $row[$keys[$count]],
//                    'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
//                        ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
//                        ->first(),
//                ]);
//            }
//            $count++;
//        }
//
//        dd($result);
//
//        return $result;

//
//        return [
//            new PLedger([
//                'emp_ctrl' => $employee ? $employee->emp_ctrl : "00000",
//                'wd_id' => $wd_ref,
//                'amount' => $row[$wd_ref],
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))
//                    ->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')
//                    ->first(),
//
//        ];
//    }

//    public function model(array $row)
//    {
//        $employee = Employee::where('emp_name', $row['emp_ctrl']);
//
//        $wd_ref = WDRef::all();
//
//        return array_map(function ($wd) use ($employee, $row) {
//            if (!empty($row[$wd->desc])) {
//                return new PLedger([
//                    'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
//                    'wd_id' => $wd->wd_desc,
//                    'amount' => (int)$row[$wd->wd_desc],
//                    'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))
//                        ->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')
//                        ->first(),
//                ]);
//            }
//        }, $wd_ref);
//    }

//        return [
//
//
//            new PLedger([
//                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
//                'wd_id' => 'sss',
//                'amount' => (int)$row['sss'],
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
//            ]),
//            new PLedger([
//                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
//                'wd_id' => 'pagibig',
//                'amount' => (int)$row['pagibig'],
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
//            ]),
//
//            new PLedger([
//                'emp_ctrl' => $employee->exists() ? $employee->pluck('emp_ctrl')->first() : "00000",
//                'wd_id' => 'philhealth',
//                'amount' => (int)$row['philhealth'],
//                'period' => Period::where('pfrom', Date::excelToDateTimeObject($row['from'])->format('Y-m-d'))->where('pto', Date::excelToDateTimeObject($row['to'])->format('Y-m-d'))->pluck('period')->first(),
//            ])
//
//        ];


    public function headingRow(): int
    {
        return 1;
    }


}
