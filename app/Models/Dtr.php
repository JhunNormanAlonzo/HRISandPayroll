<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtr extends Model
{
    use HasFactory;

    protected $table = "dtr";

    protected $guarded = [];

    public $timestamps = false;
}
