<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Scopes\EmployeeScope;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeDetailsExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Employee::query()
            ->withoutGlobalScope(EmployeeScope::class)
            ->select('emp_name', 'area_ctrl', 'emp_no', 'emp_fired');
    }

    public function headings(): array
    {
        return [
            'FullName',
            'Location',
            'EmpNo',
            'EmpFired',
        ];
    }

    public function map($employee): array{
        return [
            'emp_name' => $employee->emp_name,
            'area_ctrl' => Location::where('loc_code', $employee->area_ctrl)->pluck('location')->first(),
            'emp_no' => $employee->emp_no,
            'emp_fired' => $employee->emp_fired == '1' ? 'Fired' : 'Active',
        ];
    }
}
