<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table ='countryname';
    public $primaryKey ='NAME';
    public $timeStamps = true;
}

