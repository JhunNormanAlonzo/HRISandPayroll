<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $table = "period";
    public $primaryKey = 'per_uid';
    protected $guarded = [];

    public $timestamps = false;
}
