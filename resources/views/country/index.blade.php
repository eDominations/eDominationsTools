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
<html lang="en">
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/style.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

  <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                   
                </li>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/battle">Battles</a>
                </li>
                <li>
                    <a href="/battle-history">Battle History</a>
                </li>
                <li>
                <a href="/country">Countries</a>
                </li>
                <li>
                <a href="/players">Players</a>
                </li>
             </ul>
        </nav></div>
       
<body>
<?php

$battleMu2= DB::select("SELECT SUM(DMG1HIT) AS DMGPOWER , CS
FROM players
where LastSeenAgo <= 8
GROUP BY CS");

$bat2 = DB::select("SELECT COUNT(Banned) AS Ban, CS
FROM players
WHERE Banned='yes'
GROUP BY CS");

$bat3 = DB::select("SELECT COUNT(CS) AS PLY , CS
FROM players
GROUP BY CS");

$bat4 = DB::select("SELECT COUNT(CS) AS CSS , CS
FROM players
WHERE LastSeenAgo <= 8
GROUP BY CS");

$bat5 = DB::select("SELECT COUNT(CS) AS CSS , CS
FROM players
WHERE LastSeenAgo >= 8 AND Banned='NO'
GROUP BY CS");
?>


   <div class="row justify-content-center">
    <div class="col-8">
        <table class="table table-dark table-lg table-bordered battlehistory " >
        <thead class="thead-dark">
            
         
        <tr>
                <th colspan="7" ><h2 align="center">COUNTRY TABLE</h2></th>
                </tr>
                <th scope="col">FLAGS</th>
                <th scope="col">COUNTRY</th>
                <th scope="col">TOTAL PLAYERS</th>
                <th scope="col">BANNED PLAYERS</th>
                <th scope="col">AFK PLAYERS(MORE THN 7DAYS)</th>
                <th scope="col">ACTIVE POPULATION</th>
                <th scope="col">DMG POWER</th>
                </thead>

 <tbody>
 <?php
for($i=0, $count = count($bat2);$i<$count;$i++) {
    $battleMu  = $battleMu2[$i];
    $bat22 = $bat2[$i];
    $bat33 = $bat3[$i];
    $bat55 = $bat5[$i];
    $bat44 = $bat4[$i];    
         echo 
         "<tr>"
         ."<td><img src='img/flags2/".str_replace(" ", "-",$bat22->CS).".png' width='40' height='40'>"."</td>" 
         ."<td>". $bat22->CS."</td>" 
         ."<td>". $bat33->PLY."</td>" 
         ."<td>". $bat22->Ban."</td>" 
         ."<td>". $bat55->CSS."</td>" 
         ."<td>". $bat44->CSS."</td>" 
         ."<td>". number_format($battleMu->DMGPOWER)."</td>" 
         ."</tr>";
        }
    
  ?>

 </tbody>

                </table>
                </div>
  </div>


           

           
           


        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script>
       var table = $('.battlehistory').DataTable({
        order: [[6,'desc']],
        pagingType: 'full_numbers',
        lengthMenu: [[25,35,50,-1],[25,35,50,'ALL']]});

        $('.battlehistory tfoot th').each( function (){
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="search '+title+'"/>');
        });
        table.columns().every( function (){
          var that = this;
          $('input', this.footer() ).on('keyup change', function(){
            if( that.search() !== this.value){
              that.search( this.value).draw();
            }
            
          });
          });
        </script>
        </div>
        </body>
        </html>



@endsection

@section('footer')

@endsection