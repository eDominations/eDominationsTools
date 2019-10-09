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
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
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



            </ul>
        </nav></div>

<body>




<div id="row">
<div class="col-8"> </div>
  <div class="col-4">.. </div>
</div>
<div id="row"><div class="col-8">... </div>
  <div class="col-4">.... </div></div>


<?php


?>

<h1 class="text-center"><br>Welcome eDominations-Tools</h1></br>
<div id="adsdiv" class="text-center"> </div>
<h2 class="text-center"><br>Now eDominations-Tools is alive..</h2></br>
<div class="text-center">Contributed by <a href="https://www.edominations.com/en/profile/21460">byBatu</a>, <a href="https://www.edominations.com/en/profile/1140">RealMarcial</a> </div>
<h4 class="text-center">We have Battles - Battles History - Battle Details Alive.</h4>
<h4 class="text-center"><br>In Battle History Page takes some seconds for load, please wait it( it gets 19.000 battle with details, so you wont have to search for it)  If you have any Question-Problem-Idea please write <a href="https://www.edominations.com/en/messages/compose/21460" target="_blank">here</a> or <a href="https://www.edominations.com/en/messages/compose/1140" target="_blank">here</a>.</h4></br>
<h2 class="text-center">STAY TUNED FOR NEXT UPDATES..<i class="glyphicon glyphicon-thumbs-up" style="color:blue"></h2></i>


</body>
</html>
    <?php
    use Illuminate\Support\Facades\DB;
    ?>

    <?php

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
