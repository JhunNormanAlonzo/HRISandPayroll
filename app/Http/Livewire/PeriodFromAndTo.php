<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class PeriodFromAndTo extends Component
{
    public $startDate;
    public $endDate;
    public $totalDays;
    public $pmy;


    public function calculateLeaveDays(){
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        $days = $this->diffInDaysFiltered($start, $end);
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
        $this->startDate = date('Y-m-d');
        $this->endDate = date('Y-m-d');
        $this->pmy = date('Y-m-d');
        $this->totalDays = 1;
    }

    public function render()
    {
        return view('livewire.period-from-and-to');
    }
}
