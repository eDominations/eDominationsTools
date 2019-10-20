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
        <link rel="stylesheet" href="/css/style2.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <style>
         table {
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #1a1818;
    padding-top: 5px;
    margin-top: 5px;
    }
    td,th {
    border-top: 1px solid #1a1818;
        }
    tbody tr:nth-child(even)  td { background-color: #1a1818; }
    @media screen and (max-width: 540px) {
	table {
		overflow-x: auto;
		display: block;
}
}</style>
       <div class="menu-wrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger"><div></div></div>
    <div class="menu">
      <div>
        <div>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/battle">Battles</a></li>
            <li><a href="/battle-history">Battle Histor</a></li>
            <li><a href="/country">Countries</a></li>
            <li><a href="/players">Players</a></li>
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
$player= DB::table('players')->join('mudetails','mudetails.ID','=','players.MilitaryUnitID')->select("players.Name","players.Energy","players.Level","players.Strength","players.CS","players.MilitaryUnitID","players.MilitaryRank","players.DMG1HIT","players.TotalDMG","players.MilitaryRank2" , "mudetails.MilitaryUnit" , "players.ID")->orderBy("players.TotalDMG" ,"DESC")->paginate(300);
?>
<div class="row"> ........</div>
  <div class="row"> ........</div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
           
   
    <div class="row justify-content-center">          
    <table class="table table-dark table-bordered players" >
    <thead class="thead-dark">
        <tr>
                <th colspan="11" ><h2 align="center">PLAYERS</h2></th>
                </tr>
         
            
                <th> </th>
                <th>ID</th>
                <th>NAME </th>
                <th>ENERGY</th>
                <th>LEVEL</th>
                <th>STRENGH</th>
                <th>CITIZENSHIP</th>
                <th>MILITARY UNIT</th>
                <th>MILITARY RANK</th>
                <th>DAMAGE POWER</th>
                <th>TOTAL DMG(LIFE-TIME)</th>
                </thead>
 <tbody>

 <?php

foreach ($player as $obj5)

 echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj5->ID.".jpg' width='80' height='80'>"."</td>" 
.'<td>'.$obj5->ID.'</a></td>' 
."<td><a href='https://www.edominations.com/en/profile/".$obj5->ID."'>" .$obj5->Name."</td></a>"
."<td><div class='progress'><div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow=$obj5->Energy aria-valuemin='0' aria-valuemax= '2000' style='width:$obj5->Energy%'>"."</div></div></td>"
.'<td>'.$obj5->Level.'</a></td>'  
.'<td>'.$obj5->Strength.'</a></td>' 
."<td><img src='/img/flags2/".str_replace(" ", "-",$obj5->CS).".png' width='50' height='50'>".$obj5->CS."</td>" 
.'<td>'.$obj5->MilitaryUnit.'</a></td>' 
.'<td>'.$obj5->MilitaryRank .'-'. $obj5->MilitaryRank2. "<img src='https://www.edominations.com/public/game/ranks/".$obj5->MilitaryRank.".png'>" .'</a></td>' 
."<td>".number_format($obj5->DMG1HIT)."</td>"
."<td>".number_format($obj5->TotalDMG)."</td></tr>";?>

 </tbody>
 
 <tfoot>
 <th > </th>
                <th scope="col">ID</th>
                <th scope="col">NAME </th>
                <th scope="col">ENERGY</th>
                <th scope="col">LEVEL</th>
                <th scope="col">STRENGH</th>
                <th scope="col">CITIZENSHIP</th>
                <th scope="col">MILITARY UNIT</th>
                <th scope="col">MILITARY RANK</th>
                <th scope="col">DAMAGE POWER</th>
                <th scope="col">TOTAL DMG(LIFE-TIME)</th>
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
        lengthMenu: [11]
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
