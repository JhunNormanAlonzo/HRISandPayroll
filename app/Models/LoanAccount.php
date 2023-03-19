<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    use HasFactory;

    protected $table = 'loanacct';


    protected $primaryKey = 'la_uid';

    protected $guarded = [];

    public $timestamps = false;
}
