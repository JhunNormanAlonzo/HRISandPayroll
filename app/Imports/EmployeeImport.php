<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $model
    */
    public function model(array $row)
    {




        return new Employee([
           'area_ctrl' => Location::where('location', $row['area_ctrl'])->pluck('loc_code')->first(),
           'emp_no' => $row['emp_no'],
           'emp_dept' => Department::where('dept_desc', $row['emp_dept'])->pluck('emp_dept')->first(),
           'emp_name' => $row['emp_name'],
           'emp_lname' => $row['emp_name'],
           'emp_fname' => $row['emp_fname'],
           'emp_mi' => $row['emp_mi'],
           'emp_suffix' => $row['emp_suffix'],
           'emp_stat' => $row['emp_stat'],
           'emp_bacct' => $row['emp_bacct'],
           'emp_dayoff1' => $row['emp_dayoff1'] ?? 'NONE',
           'emp_dayoff2' => $row['emp_dayoff2'] ?? 'NONE',
           'emp_addr' => $row['emp_addr'],
           'emp_pos' => $row['emp_pos'],
           'emp_salary' => $row['emp_salary'],
           'emp_sssno' => $row['emp_sssno'],
           'emp_ssscont' => $row['emp_ssscont'],
           'emp_tinno' => $row['emp_tinno'],
           'emp_tincont' => $row['emp_tincont'],
           'emp_pagno' => $row['emp_pagno'],
           'emp_pagcont' => $row['emp_pagcont'],
           'emp_dstart' => Carbon::parse($row['emp_dstart'])->format('Y-m-d'),
           'emp_fdate' => $row['emp_fdate'],
           'emp_bdate' => Carbon::parse($row['emp_bdate'])->format('Y-m-d'),
           'emp_sex' => $row['emp_sex'],
           'emp_cstat' => $row['emp_cstat'],
           'emp_wt' => $row['emp_wt'],
           'emp_relgn' => $row['emp_relgn'],
           'emp_spouse' => $row['emp_spouse'],
           'emp_moname' => $row['emp_moname'],
           'emp_mocc' => $row['emp_mocc'],
           'emp_faname' => $row['emp_faname'],
           'emp_faocc' => $row['emp_faocc'],
           'emp_phicno' => $row['emp_phicno'],
           'emp_rank' => $row['emp_rank'],
           'emp_grade' => $row['emp_grade'],
           'emp_email' => $row['emp_email'],
           'emp_cellphone' => $row['emp_cellphone'],
           'emp_telephone' => $row['emp_telephone'],
           'emp_addr2' => $row['emp_addr2'],
           'reg_date' => Carbon::parse($row['reg_date'])->format('Y-m-d'),
           'emp_licno' => $row['emp_licno'],
           'emp_psrem' => $row['emp_psrem'],
           'emp_age' =>  Carbon::parse($row['emp_bdate'])->diffInYears(Carbon::now('Asia/Manila')),
        ]);
    }
}
