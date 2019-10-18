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
        <link rel="stylesheet" href="/css/style.css">


        <body>
        
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
                <li>
                <a href="/calculator">Calculator</a>
                </li>
                <li>
                <a href="/shame">SHAME-WALL</a>
                </li>
             </ul>
        </nav></div>


        
        <div class="row justify-content-center">
    <div class="col-auto">
        <table class="table-hover table-dark table-sm table-bordered " >
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
 </tbody></table></div></div>
        </body>
        </html>

@endsection

@section('footer')

@endsection
