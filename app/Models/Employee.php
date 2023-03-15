<?php

namespace App\Models;

use App\Models\Scopes\EmployeeScope;
use App\Models\Scopes\MyGlobalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employee";

    protected static function booted(): void
    {
        static::addGlobalScope(new EmployeeScope());
    }

    protected $guarded = [];

    public $timestamps = false;


}
