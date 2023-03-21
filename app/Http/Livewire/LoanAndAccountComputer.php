<?php

namespace App\Http\Livewire;


use App\Models\LoanAccount;
use Livewire\Component;

class LoanAndAccountComputer extends Component
{

    public $balance;
    public $split;
    public $amortization;

    public function computeAmortization(){
        if (empty($this->split)){
            $this->split = 1;
        }
        if (empty($this->balance)){
            $this->balance = 0;
        }
        $this->amortization = $this->balance / $this->split;
    }




    public function render()
    {
        return view('livewire.loan-and-account-computer');
    }
}
