<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use App\Models\Period;
use App\Models\PLedger;
use App\Models\WdRef;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class ReportController extends Controller
{
    public function employeeReport()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('report.employee', compact('employees'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('employee_report.pdf');
    }

    public function contributionView(){
        $employees = Employee::all();
        $periods = Period::all();
        return view('report.contribution', compact('employees', 'periods'));
    }
    public function contributionPost(Request $request){
        $this->validate($request, [
            'tag' => 'required|in:SSS,Pagibig,Philhealth',
        ]);

        dd($request);
//        return view('report.contribution');
    }

    public function payrollSummary(Request $request){
        $pname = "March 11 - 25, 2023";

        $emp_ctrls = PLedger::distinct('emp_ctrl')->pluck('emp_ctrl');


        $period = Period::where('pname', $pname)->pluck('period')->first();

        $refs = WdRef::pluck('wd_desc');

        return view('report.payroll_summary', compact('refs', 'emp_ctrls', 'period'));


        foreach ($emp_ctrls as $ctrl){
            $employee = Employee::where('emp_ctrl', $ctrl)->first();
            foreach ($employee->p_ledgers()->where('period', $period)->get() as $led){
                $wd_desc = WdRef::where('wd_id', $led->wd_id)->pluck('wd_desc')->first();
                echo $wd_desc." ".$led->amount." <br>";
            }
            echo "<hr>";
        }


    }

}
