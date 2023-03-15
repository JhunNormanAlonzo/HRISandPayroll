<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WdRef extends Model
{
    use HasFactory;

    protected $table = "wd_ref";

    protected $primaryKey = "wd_id";

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;
}
