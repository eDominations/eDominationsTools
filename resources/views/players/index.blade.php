@extends('master')

@section('content')
<?php 
use Illuminate\Support\Facades\DB;
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
<li><a href='/disaster'>Disasters</a></li>
            <li><a href="/shame">Shame-Wall</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    </head>      
        <body>
        <?php
$player= DB::Select("SELECT players.name,players.DMG1HIT, SUM(last7days.Hits) as Hits, players.MilitaryRank,players.Energy,players.Level,players.Strength,players.CS,players.MilitaryUnitID,players.MilitaryRank2,players.ID,mudetails.MilitaryUnit,players.TotalDMG, SUM(last7days.DMG) as Last7
FROM players
INNER JOIN mudetails ON players.MilitaryUnitID = mudetails.ID
INNER JOIN last7days ON players.ID = last7days.ID2
WHERE players.ID > 101
GROUP BY ID  
ORDER BY `players`.`TotalDMG`  DESC
LIMIT 300");
?>



<div class="row"> ........</div>
  <div class="row"> ........</div>
    <div class="col-md-12 col-xs-12">  
      <div class="table-responsive">    
    <table class="table table-dark table-bordered players" >
    <thead class="thead-dark">
        <tr>
                <th colspan="12" ><h2 align="center">PLAYERS</h2></th>
                </tr>
         
            
                <th> </th>
                <th>NAME </th>
                <th>ENERGY</th>
                <th>LEVEL</th>
                <th>STRENGH</th>
                <th>CITIZENSHIP</th>
                <th>MILITARY UNIT</th>
                <th>MILITARY RANK</th>
                <th>DAMAGE POWER</th>
                <th>TOTAL DMG</th>
                <th>LAST 7 DAYS DMG</th>
                <th>HITS 7 DAYS</th>
                </thead>
 <tbody>

 <?php

foreach ($player as $obj5)

 echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj5->ID.".jpg' width='80' height='80'>"."</td>" 
."<td><a href='/players/".str_replace(" ", "-",$obj5->ID)."'>" .$obj5->name."</td></a>"   
."<td><div class='progress'><div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow=$obj5->Energy aria-valuemin='0' aria-valuemax= '2000' style='width:$obj5->Energy%'>"."</div></div></td>"
.'<td>'.$obj5->Level.'</a></td>'  
.'<td>'.$obj5->Strength.'</a></td>' 
."<td><img src='/img/flags2/".str_replace(" ", "-",$obj5->CS).".png' width='40' height='40'>".$obj5->CS."</td>" 
.'<td>'.$obj5->MilitaryUnit.'</a></td>' 
.'<td>'.$obj5->MilitaryRank .'-'. $obj5->MilitaryRank2. "<img src='https://www.edominations.com/public/game/ranks/".$obj5->MilitaryRank.".png'>" .'</a></td>' 
."<td>".number_format($obj5->DMG1HIT)."</td>"
."<td>".number_format($obj5->TotalDMG)."</td>"
."<td>".number_format($obj5->Last7)."</td>"
."<td>".number_format($obj5->Hits)."</td></tr>";?>

 </tbody>
 
 <tfoot>
 <th > </th>
                <th scope="col">NAME </th>
                <th scope="col">ENERGY</th>
                <th scope="col">LEVEL</th>
                <th scope="col">STRENGH</th>
                <th scope="col">CITIZENSHIP</th>
                <th scope="col">MILITARY UNIT</th>
                <th scope="col">MILITARY RANK</th>
                <th scope="col">DAMAGE POWER</th>
                <th scope="col">TOTAL DMG</th>
                <th scope="col">LAST 7 DAYS DMG</th>
                <th scope="col">HITS 7 DAYS</th>
 </tfoot>
 </table> </div> 
 </div> </div> </div> </div> </div>
 </div> </div> </div> </div> </div>





   <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script>
       var table = $('.players').DataTable({
        paging: true,
        lengthMenu: [10]
        });

        $('.players tfoot th').each( function (){
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
       

        </body>
        </html>

@endsection

@section('footer')

@endsection

