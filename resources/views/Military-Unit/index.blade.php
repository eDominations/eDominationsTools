@extends('master')

@section('content')
<?php 
use Illuminate\Support\Facades\DB;
?>


<?php
use App\Http\Helpers\Endpointsv2;
$getsomething = new Endpointsv2('');
foreach($getsomething->getBattles()[0] as $row);
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
            <li><a href="/shame">Shame-Wall</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    </head>      
        <body>
        <?php

$mu1= DB::select("SELECT SUM(last7days.DMG) AS DMG , mudetails.MilitaryUnit, SUM(last7days.Hits) as Hits , mudetails.ID , MUDET.AKTIF , MUDET2.TOTAL , mudetails.Country, MUDET3.AFK, MUDET4.POT
FROM mudetails
INNER JOIN players 
ON mudetails.ID = players.MilitaryUnitID
LEFT JOIN last7days ON players.ID = last7days.ID2
LEFT JOIN (SELECT MilitaryUnitID, count(MilitaryUnitID) as AKTIF
      FROM players
            WHERE players.LastSeenAgo < 8
     GROUP BY players.MilitaryUnitID) AS MUDET ON mudetails.ID = MUDET.MilitaryUnitID
LEFT JOIN (SELECT MilitaryUnitID, count(MilitaryUnitID) as TOTAL
      FROM players
     GROUP BY players.MilitaryUnitID) AS MUDET2 ON mudetails.ID = MUDET2.MilitaryUnitID
LEFT JOIN (SELECT players.MilitaryUnitID, count(players.MilitaryUnitID) as AFK
      FROM players 
           WHERE players.LastSeenAgo > 8
     GROUP BY players.MilitaryUnitID) AS MUDET3 ON mudetails.ID = MUDET3.MilitaryUnitID
     LEFT JOIN (SELECT players.MilitaryUnitID, SUM(players.DMG1HIT) as POT
      FROM players 
                  WHERE players.LastSeenAgo < 8
     GROUP BY players.MilitaryUnitID) AS MUDET4 ON mudetails.ID = MUDET4.MilitaryUnitID
GROUP BY mudetails.ID  
ORDER BY `DMG`  DESC");


?>
<div class="row"> ........</div>
  <div class="row"> ........</div>

   
           
   
    <div class="row justify-content-center">   
    <div class="col-md-11 col-xs-12">  
      <div class="table-responsive">    
    <table class="table table-dark table-bordered players" >
    <thead class="thead-dark">
        <tr>
                <th colspan="11" ><h2 align="center">PLAYERS</h2></th>
                </tr>
         
            
                <th> </th>
                <th>Military Unit </th>
                <th>COUNTRY</th>
                <th>TOTAL PLAYERS</th>
                <th>AFK PLAYERS</th>
                <th>ONLY 2 CLICK</th>
                <th>ACTIVE POPULATION</th>
                <th>LAST 7 DAYS DMG!</th>
                <th>LAST 7 DAYS HITS!</th>
                <th>DAMAGE POWER</th>
                </thead>
 <tbody>

 <?php

    foreach($mu1 as $obj5)

 echo 
 "<tr><td><img src='https://www.edominations.com/public/upload/group/".$obj5->ID.".jpg' width='40' height='40'>"."</td>" 
 ."<td><a href='https://www.edominations.com/en/military-unit/".$obj5->ID."'>" .$obj5->MilitaryUnit."</td></a>"
 ."<td><img src='/img/flags2/".str_replace(" ", "-",$obj5->Country).".png' width='50' height='50'>".$obj5->Country."</td>" 
 .'<td>'.$obj5->TOTAL.'</td>' 
 .'<td>'.$obj5->AFK.'</td>' 
 .'<td>'.$new= ($obj5->TOTAL - ($obj5->AFK + $obj5->AKTIF)).'</td>'  
 .'<td>'.$obj5->AKTIF.'</td>'
 ."<td>".number_format($obj5->DMG)."</td>"
 ."<td>".number_format($obj5->Hits)."</td>"
 ."<td>".number_format($obj5->POT)."</td></tr>";?>

 </tbody>
 
 <tfoot>

                <th> </th>
                <th>Military Unit </th>
                <th>COUNTRY</th>
                <th>TOTAL PLAYERS</th>
                <th>AFK PLAYERS(MORE THN 7DAYS)</th>
                <th>ONLY 2 CLICK</th>
                <th>ACTIVE POPULATION</th>
                <th>LAST 7 DAYS DMG!</th>
                <th>LAST 7 DAYS HITS!</th>
                <th>DAMAGE POWER</th>
 </tfoot>
 </table> 
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
        lengthMenu: [[12,35,50,-1],[12,35,50,'ALL']]
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

