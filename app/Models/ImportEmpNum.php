<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportEmpNum extends Model
{
    use HasFactory;

    protected $table = "import_emp_num";

    protected $guarded = [];

    public $timestamps = false;
}
