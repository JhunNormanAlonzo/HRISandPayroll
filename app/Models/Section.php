<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';

    protected $primaryKey = 's_uid';

    protected $guarded = [];

    public $timestamps = false;

    public function setAttribute($key, $value)
    {
       if ($key == 'sectioncode'){
           $value = strtoupper($value);
       }

       return parent::setAttribute($key, $value);
    }
}
