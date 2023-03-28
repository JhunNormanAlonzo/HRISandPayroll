<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Period;
use App\Models\PLedger;
use App\Models\WDRef;
use Carbon\Carbon;
use Illuminate\Console\OutputStyle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Psy\Readline\Hoa\ConsoleOutput;

use Symfony\Component\Console\Input\StringInput;

class PLedgerImport implements ToModel, WithHeadingRow, WithChunkReading
{


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

//        $employee = Employee::where('emp_name', $row['emp_ctrl']);

        $period = Period::where('pfrom', Date::excelToDateTimeObject($row['pfrom'])->format('Y-m-d'))
            ->where('pto', Date::excelToDateTimeObject($row['pto'])->format('Y-m-d'))->pluck('period')
            ->first();
        $pLedgers = array();

        $loc_code = Employee::where('emp_ctrl', $row['emp_ctrl'])->pluck('loc_code')->first();

        foreach ($wd_ref as $wd_desc) {

            if (isset($row[strtolower(str_replace(' ', '_', $wd_desc))])){
                $pLedgers[] = new PLedger([
                    'loc_code' => $loc_code ?? " ",
                    'reference' => strtoupper(Str::random(10)),
                    'emp_dept' => isset($row['emp_dept']) ? $row['emp_dept'] : "00000",
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

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000; // specify the number of rows to import per chunk
    }


    public function headingRow(): int
    {
        return 1;
    }


}
