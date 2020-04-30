@extends('master')

<?php
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

$res = DB::select('SELECT  MilitaryUnit , SUM(DMG) AS damage , battledamage.Unit , SUM(Hits) AS hit , Country
from  mudetails
INNER JOIN battledamage  ON mudetails.ID = battledamage.Unit 
WHERE Side="attack"
GROUP BY Unit , mudetails.MilitaryUnit, Country');

$res1 = DB::select('SELECT  MilitaryUnit , SUM(DMG) AS damage , battledamage.Unit , SUM(Hits) AS hit , Country
from  mudetails
INNER JOIN battledamage  ON mudetails.ID = battledamage.Unit 
WHERE Side="defense"
GROUP BY Unit , mudetails.MilitaryUnit, Country');

?>


   <!DOCTYPE html>  
   <html>  
      <head>  



{!! Form::select('NAME', $items, array('class' => 'form-control')) !!}


 </html>  