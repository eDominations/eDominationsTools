@extends('master')

@section('content')
<?php 
use Illuminate\Support\Facades\DB;
?>

<div class="container-fluid">
eDominations
</div>
<?php
use App\Http\Helpers\Endpointsv2;
$getsomething = new Endpointsv2('');
foreach($getsomething->getBattles()[0] as $row);
?>
        <!DOCTYPE html>
        <html>
        <title>
            GET DATA
        </title>
        <div id="main">
       <div id="main_form">
        <body>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <table align="center" border="1px" style="width 600px; line-height:40px;">
            <tr>
                <th colspan="9" ><h2 align="center">BATTLES</h2></th>
            </tr>
            <div id="main_table">
            <t>
                <th>TYPE</th>
                <th>ID</th>
                <th>ATTACKER <th>ROUND</th></th>
                <th>DEFENDER<th>ROUND</th></th>
                <th>REGION</th>
                <th>DATE</th>
                <th>BATTLE INFO</th>
                
            </t>

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


  




                </table>
        </body>
        </div></div></div>

        </html>

@endsection

@section('footer')

@endsection
