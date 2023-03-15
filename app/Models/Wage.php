<?php

namespace App\Models;

use App\Models\Scopes\WageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    use HasFactory;

    protected static function booted(){
        static::addGlobalScope(new WageScope());
    }

    protected $table = "wd_ref";

    protected $primaryKey = "wd_id";

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;



}
