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
$player= DB::Select("SELECT countryname.NAME as Name, countryname.ID , disaster.name as Disaster , DisasterDB.damage_reduction AS DMG , DisasterDB.production_reduction as PRO , DisasterDB.game_day As day
FROM DisasterDB
INNER JOIN countryname ON DisasterDB.production_country = countryname.ID
INNER JOIN disaster ON DisasterDB.disaster_type = disaster.disaster  
ORDER BY `day` DESC");
?>



<div class="row"> ........</div>
  <div class="row"> ........</div>
    <div class="col-md-12 col-xs-12">  
      <div class="table-responsive">    
    <table class="table table-dark table-bordered players" >
    <thead class="thead-dark">
        <tr>
                <th colspan="6" ><h2 align="center">DISASTERS</h2></th>
                </tr>
         
            
                <th> </th>
                <th>Country </th>
                <th>Disaster</th>
                <th>DAMAGE REDUCTION</th>
                <th>PRODUCTION REDUCTION</th>
                <th>GAME-DAY</th>
                </thead>
 <tbody>

 <?php

foreach ($player as $obj5)

 echo 
 "<td><img src='img/flags2/".str_replace(" ", "-",$obj5->Name).".png' width='50' height='50'>"."</td>" 
."<td>" .$obj5->Name."</td>"
."<td>". $obj5->Disaster."</td>" 
."<td>". $obj5->DMG.'%'."</td>" 
."<td>". $obj5->PRO.'%'."</td>" 
."<td>". $obj5->day."</td>" 
."</tr>";

?>

 </tbody>
 
 <tfoot>
 <th > </th>
                <th scope="col">Country </th>
                <th scope="col">Disaster</th>
                <th scope="col">DAMAGE REDUCTION</th>
                <th scope="col">PRODUCTION REDUCTION</th>
                <th scope="col">GAME-DAy</th>
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


