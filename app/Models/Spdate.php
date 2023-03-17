<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spdate extends Model
{
    use HasFactory;

    protected $table = "sp_date";

    protected $primaryKey = "sp_ctrl";

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;
}
