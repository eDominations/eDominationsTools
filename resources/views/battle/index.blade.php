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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script></head> 
        
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
  
        
        <div class="row">..........</div>
        <div class="row">..........</div>
        <div class="row">..........</div>
          
        <div class="row justify-content-center">           
        <div class="row">
        <table class="table table-dark table-bordered" >
        <div class="table-responsive">
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



 <tbody>
 <tr>
        <?php
foreach($getsomething->getBattles()[0] as $row)
{print "<tr>"
       ."<td>". $row['Type']."</td>" 
       ."<td>". $row['ID'] ."</td>"
       ."<td><img src='img/flags/".$row['AttackerSlug'].".png' width='40' height='40'>". $row['Attacker'] ."</td>" 
       ."<td><strong>".$row['RoundAtt']."</strong></td>"
       ."<td><img src='img/flags/".$row['DefenderSlug'].".png' width='40' height='40'>". $row['Defender'] ."</td>" 
       ."<td><strong>".$row['RoundDef']."</strong></td>"
       ."<td>". $row['Region'] ."</td>" 
       ."<td>". $row['Date'] ."</td>"
       .'<td><a href="/battle/'.$row['ID'].'">BATTLE INFO</a>' 
       ."</td>"
       ."</tr>";
       
  }
  "</div></div>";?>
</tr>
 </tbody></table></div></div></div></div></div></div>
        </body>
        </html>

@endsection

@section('footer')

@endsection
