<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhTable extends Model
{
    use HasFactory;

    protected $table = "ph_table";

    protected $primaryKey = "phiccode";

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;
}
