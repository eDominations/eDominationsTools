@extends('master')

@section('content')
<?php 
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Endpointsv2;
$getsomething = new Endpointsv2('');
?>


 <?php DB::table('battles')->delete();?>
            <?php
            
    foreach ($getsomething->getBattles()[0] as $obj)  {
        foreach ($obj as $key => $value) {
            $insertArr[str_slug($key,'')] = $value;
        } 
        
        $test =  DB::table('battles')->updateOrInsert(
            array('id'=>$insertArr['id'],'attacker'=>$insertArr['attacker'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date']),
            array('id'=>$insertArr['id'],'attacker'=>$insertArr['attacker'],'defender'=> $insertArr['defender'],'region' => $insertArr['region'],'round' => $insertArr['round'],'roundatt' => $insertArr['roundatt'],'rounddef' => $insertArr['rounddef'],'date' => $insertArr['date'])
        );
    }
?>


<?php
$test = DB::table('battles')->first();


$battlehist2 = DB::table('battlehist')->where('ID','<',$test->ID )->where('ID','>',18000)->get(); 

?>
        <!DOCTYPE html>
        <html>
        <title>
            eDominations-Tools
        </title>
      <head>
      <link rel="stylesheet" href="/css/style3.css">   
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 <style>
       table {
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #1a1818;
    padding-top: 40px;
    margin-top: 50px;
    }
    td,th {
    border-top: 1px solid #1a1818;
    padding: 4px 8px;
    }
    tbody tr:nth-child(even)  td { background-color: #1a1818; }
    @media screen and (max-width: 640px) {
	table {
		overflow-x: auto;
		display: block;
}
}
 </style>
 </head>
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
  </div><body>

     
    

  <div class="row"> ........</div>
  <div class="row"> ........</div>
  <div class="row"> ........</div>
    <div class="row justify-content-center">
        <div class="table-responsive">
    <div class="col-md-12">
        <table class="table table-dark table-bordered battlehistory " >
        <thead class="thead-dark">
            
         
            <tr>
                <th colspan="9" ><h2 align="center">BATTLES</h2></th>
                </tr>
                <th scope="col">TYPE</th>
                <th scope="col">ID</th>
                <th scope="col">ATTACKER <th scope="col">ROUND</th></th>
                <th scope="col">DEFENDER<th scope="col">ROUND</th></th>
                <th scope="col">REGION</th>
                <th scope="col">DATE</th>
                <th scope="col">BATTLE INFO</th>
                </thead>

 <tbody>
 <?php

        foreach ($battlehist2 as $obj5)
        
         echo 
         "<tr>"
         ."<td>". $obj5->Type."</td>" 
         ."<td>". $obj5->ID ."</td>"
         ."<td><img src='img/flags/".$obj5->attackerslug.".png' width='40' height='40'>". $obj5->Attacker ."</td>" 
         ."<td><strong>".$obj5->RoundAtt."</strong></td>"
         ."<td><img src='img/flags/".$obj5->defenderslug.".png' width='40' height='40'>". $obj5->Defender ."</td>" 
         ."<td><strong>".$obj5->RoundDef."</strong></td>"
         ."<td>". $obj5->Region ."</td>" 
         ."<td>". $obj5->Date ."</td>"
         .'<td><a href="/battle/'.$obj5->ID.'">BATTLE INFO</a>' 
         ."</td>"
         ."</tr>";
    
    
  ?>

 </tbody>

 <tfoot>
                <th scope="col">TYPE</th>
                <th scope="col">ID</th>
                <th scope="col">ATTACKER <th scope="col">ROUND</th></th>
                <th scope="col">DEFENDER<th scope="col">ROUND</th></th>
                <th scope="col">REGION</th>
                <th scope="col">DATE</th>
                <th scope="col">BATTLE INFO</th>
 </tfoot>
                </table>
                </div>
  </div></div></div></div>
      



           

           
           


        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script>
       var table = $('.battlehistory').DataTable({
        order: [[1,'desc']],
        pagingType: 'full_numbers',
        lengthMenu: [[12,25,35,50,-1],[12,25,35,50,'ALL']]});

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
        
        </body>
        </html>

@endsection

@section('footer')

@endsection
