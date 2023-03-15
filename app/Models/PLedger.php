<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLedger extends Model
{
    use HasFactory;

    protected $table = "p_ledger";

    protected $guarded = [];

    public $timestamps = false;
}
