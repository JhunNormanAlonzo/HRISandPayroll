<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLevel extends Model
{
    use HasFactory;

    protected $table = 'employee_level';


    protected $guarded = [];

    public $timestamps = false;
}
