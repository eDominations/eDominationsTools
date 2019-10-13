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


     
            
<div id="row">
<div class="col-8"> </div>
  <div class="col-4">.. </div>
</div>
<div id="row"><div class="col-8">... </div>
  <div class="col-4">.... </div></div>


<?php  


?>

<h1 class="text-center"><br>Welcome eDominations-Tools</h1></br>
<h2 class="text-center"><br>Now eDominations-Tools is alive..</h2></br>
<h4 class="text-center">We have Battles - Battles History - Battle Details - Country - Players Stats Alive.</h4>
<h4 class="text-center">Players stats has top 300 in search panel , for lower than 300 please use page numbers in bottom .</h4>
<h4 class="text-center"><br>In Battle History Page takes some seconds for load, please wait it( it gets 19.000 battle with details, so you wont have to search for it)  If you have any Question-Problem-Idea please write <a href="https://www.edominations.com/en/messages/compose/21460" target="_blank">here</a> or <a href="https://www.edominations.com/en/messages/compose/1140" target="_blank">here</a>.</h4></br>
<h2 class="text-center">STAY TUNED FOR NEXT UPDATES..<i class="glyphicon glyphicon-thumbs-up" style="color:blue"></h2></i>
 

</body>
</html>


@endsection

@section('footer')

@endsection
