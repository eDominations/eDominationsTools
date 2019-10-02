<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    //
    protected $table ='battles';
    public $primaryKey ='ID';
    public $timeStamps = true;
}
