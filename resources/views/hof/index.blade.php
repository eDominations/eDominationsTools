@extends('master')

@section('content')
<?php 
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
?>

  <!DOCTYPE html>
        <html>
        <title>
            eDominations-Tools
        </title>
        <head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/style3.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<style>


</style>
</head>

       
<body>
<div class="menu-wrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger"><div></div></div>
    <div class="menu">
      <div>
        <div>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/battle">Battles</a></li>
            <li><a href="/battle-history">Battle History</a></li>
            <li><a href="/country">Countries</a></li>
            <li><a href="/players">Players</a></li>
	    <li><a href="/Military-Unit">Military Units</a></li>
            <li><a href="/calculator">Calculator</a></li>
            <li><a href="/hof">Hall Of Fame</a></li>
            <li><a href="/shame">Shame-Wall</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php

$btt = DB::select("SELECT BATTLEID , SUM(DMG) as DMG , SUM(Hits) as Hits , Count(ID2) as Player , battlehist.Date , battlehist.defenderslug , battlehist.attackerslug , battlehist.Region , battlehist.Attacker , battlehist.Defender
FROM alltime
LEFT JOIN battlehist ON battlehist.ID = alltime.BATTLEID
GROUP BY BATTLEID  
ORDER BY `DMG`  DESC
LIMIT 5");

$btt2 = DB::select("SELECT BATTLEID , SUM(DMG) as DMG , SUM(Hits) as Hits , Count(ID2) as Player , battlehist.Date , battlehist.defenderslug , battlehist.attackerslug , battlehist.Region , battlehist.Attacker , battlehist.Defender
FROM alltime
LEFT JOIN battlehist ON battlehist.ID = alltime.BATTLEID
GROUP BY BATTLEID  
ORDER BY `Hits`  DESC
LIMIT 5");

$plyr = DB::select("SELECT alltime.DMG , alltime.Name , alltime.ID2 , alltime.BATTLEID , players.CS , battlehist.Date
FROM alltime
left JOIN players ON players.ID = alltime.ID2
LEFT JOIN battlehist ON battlehist.ID = alltime.BATTLEID
ORDER BY DMG DESC
LIMIT 5");

$plyr2 = DB::select("SELECT alltime.DMG , alltime.Name , alltime.ID2 , alltime.BATTLEID , players.CS , battlehist.Date , alltime.Hits
FROM alltime
left JOIN players ON players.ID = alltime.ID2
LEFT JOIN battlehist ON battlehist.ID = alltime.BATTLEID
ORDER BY Hits DESC
LIMIT 5");

$mu = DB::Select('SELECT SUM(alltime.DMG) AS DMG , alltime.Unit , SUM(alltime.Hits) AS Hits , alltime.BATTLEID , battlehist.Date 
from  alltime
LEFT JOIN battlehist ON alltime.BATTLEID = battlehist.ID
GROUP BY alltime.Unit,  BATTLEID
ORDER BY `DMG`  DESC Limit 3');

$mu2 = DB::select('SELECT SUM(alltime.DMG) AS DMG , alltime.Unit , SUM(alltime.Hits) AS Hits , alltime.BATTLEID , battlehist.Date 
from  alltime
LEFT JOIN battlehist ON alltime.BATTLEID = battlehist.ID
GROUP BY alltime.Unit,  BATTLEID
ORDER BY `Hits`  DESC Limit 3');


?>


 <div class="row"> ........</div>
  <div class="row"> ........</div>
  <div class="row"> ........</div>
  <div class="row justify-content-center">
  <div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="6" ><h3 align="center">Top DMG by Players</h3></th>
    </tr>
    <tr>
      <th scope="col"> </th>
      <th scope="col">Name</th>
      <th scope="col">Citizenship</th>
      <th scope="col">DAMAGE</th>
      <th scope="col">Battle</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($plyr as $obj5)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj5->ID2.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/profile/".$obj5->ID2."'>" .$obj5->Name."</td></a>"
."<td><img src='img/flags/".$obj5->CS.".png' width='40' height='40'>". $obj5->CS ."</td>" 
."<td>".number_format($obj5->DMG)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj5->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".date($obj5->Date)."</td></tr>";
  ?>
  </tbody>
</table></div>
<div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="6" ><h3 align="center">Top Hits by Players</h3></th>
    </tr>
    <tr>
      <th scope="col"> </th>
      <th scope="col">Name</th>
      <th scope="col">Citizenship</th>
      <th scope="col">DAMAGE</th>
      <th scope="col">Battle</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($plyr2 as $obj4)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj4->ID2.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/profile/".$obj4->ID2."'>" .$obj4->Name."</td></a>"
."<td><img src='img/flags/".$obj4->CS.".png' width='40' height='40'>". $obj4->CS ."</td>" 
."<td>".number_format($obj4->Hits)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj4->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".date($obj4->Date)."</td></tr>";  ?>
  </tbody>
</table></div>
<div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="6" ><h3 align="center">Top DMG by Military Units</h3></th>
    </tr>
    <tr>
      <th scope="col"> </th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">DAMAGE</th>
      <th scope="col">Battle</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($mu as $obj3){
$getsomething = new Endpointsv2($obj3->Unit);
foreach ($getsomething->getMilitaryUnit() as $bbb)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/group/".$obj3->Unit.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/military-unit/".$obj3->Unit."'>" .$bbb['MilitaryUnit']."</td></a>"
."<td><img src='img/flags/".$bbb['Country'].".png' width='40' height='40'>". $bbb['Country'] ."</td>" 
."<td>".number_format($obj3->DMG)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj3->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".date($obj3->Date)."</td></tr>";
}?>
  </tbody>
</table></div>
<div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="6" ><h3 align="center">Top Hits by Military Units</h3></th>
    </tr>
    <tr>
      <th scope="col"> </th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">Hits</th>
      <th scope="col">Battle</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($mu2 as $obj2){
$getsomething = new Endpointsv2($obj2->Unit);
foreach ($getsomething->getMilitaryUnit() as $bbc)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/group/".$obj2->Unit.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/military-unit/".$obj2->Unit."'>" .$bbc['MilitaryUnit']."</td></a>"
."<td><img src='img/flags/".$bbc['Country'].".png' width='40' height='40'>". $bbc['Country'] ."</td>" 
."<td>".number_format($obj2->Hits)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj2->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".date($obj2->Date)."</td></tr>";
}  ?>
  </tbody>
</table></div>
<div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="7" ><h3 align="center">Top Battles by Damage</h3></th>
    </tr>
    <tr>
      <th scope="col">Attacker</th>
      <th scope="col">Name</th>
      <th scope="col">Citizenship</th>
      <th scope="col">DAMAGE</th>
      <th scope="col">Battle</th>
      <th scope="col">Participation</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($btt as $obj1)
        
echo 
"<tr><td><img src='img/flags/".$obj1->attackerslug.".png' width='40' height='40'>". $obj1->Attacker ."</td>"
."<td>" .$obj1->Region."</td>"
."<td><img src='img/flags/".$obj1->defenderslug.".png' width='40' height='40'>". $obj1->Defender ."</td>" 
."<td>".number_format($obj1->DMG)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj1->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".$obj1->Player."</td>"
."<td>".date($obj1->Date)."</td></tr>";
  ?>
  </tbody>
</table></div>
<div class="col-md-5 col-xs-12">  
  <table class="table table-light">
  <thead>
  <tr>
    <th colspan="7" ><h3 align="center">Top Battles by Hits</h3></th>
    </tr>
    <tr>
    <th scope="col">Attacker</th>
      <th scope="col">Name</th>
      <th scope="col">Citizenship</th>
      <th scope="col">Hits</th>
      <th scope="col">Battle</th>
      <th scope="col">Participation</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>        
<?php


foreach ($btt2 as $obj)
        
echo 
"<tr><td><img src='img/flags/".$obj->attackerslug.".png' width='40' height='40'>". $obj->Attacker ."</td>"
."<td>" .$obj->Region."</td>"
."<td><img src='img/flags/".$obj->defenderslug.".png' width='40' height='40'>". $obj->Defender ."</td>" 
."<td>".number_format($obj->Hits)."</td>"
."<td><a href='https://www.edominations.com/en/battlefield/".$obj->BATTLEID."/1'><img src='https://www.edominations.com/public/game/battle/versus.png' width='40' height='30'>"."</td></a>"
."<td>".$obj->Player."</td>"
."<td>".date($obj->Date)."</td></tr>";
  ?>
  </tbody>
</table></div>
  </div>          </div>
  </div>          </div>
  </div>


           

           
           


        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        
        </body>
        </html>



@endsection

@section('footer')

@endsection

