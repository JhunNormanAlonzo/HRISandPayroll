<?php

namespace App\Models;

use App\Models\Scopes\DeductionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new DeductionScope());
    }

    protected $table = "wd_ref";

    protected $primaryKey = "wd_id";

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;

    public function setAttribute($key, $value)
    {
        if ($key == 'wd_desc'){
            $value = strtoupper($value);
        }
        return parent::setAttribute($key, $value);
    }
}
