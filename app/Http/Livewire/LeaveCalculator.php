<?php

namespace App\Http\Livewire;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Livewire\Component;

class LeaveCalculator extends Component
{
    public $startDate;
    public $endDate;
    public $totalDays;
    public $totalHours;


    public function calculateLeaveDays(){
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        $days = $this->diffInDaysFiltered($start, $end);
        $hour_per_day = 8;
        $this->totalHours = $days * $hour_per_day;
        $this->totalDays = $days;
    }

    function diffInDaysFiltered($startDate, $endDate)
    {
        $days = 0;
        $current = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        while ($current->lt($endDate)) {
            if ($current->isWeekday()) {  // check if current day is not Saturday or Sunday
                $days++;
            }
            $current->addDay();
        }

        return $days;
    }



    public function mount()
    {
        $this->startDate = date('Y-m-d')."T08:00";
        $this->endDate = date('Y-m-d')."T17:00";
        $this->totalHours = 8;
        $this->totalDays = 1;
    }



    public function render()
    {
        return view('livewire.leave-calculator');
    }
}
