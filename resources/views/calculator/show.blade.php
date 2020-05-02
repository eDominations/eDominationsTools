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
    <link rel="stylesheet" href="/css/style.css">  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    
    <style>
    .panel2{
      padding: 25px;
    }
    .weaptab{
      margin-bottom:10px;
    }
    .booster2{
      margin-bottom: 15px;
    }
    .warriorpack{
      
      margin-bottom: 8px;
      margin-top: 10px;

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
  </div>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading ">HIT COUNTER CALCULATOR</div>            
            <a href="/calculator" class='btn btn-dark btn-sg' >BACK TO DMG CALCULATOR!</a>
            <div class="panel-body panel2">           
              <form>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/icons/energy-s.png"width='50' height='50'> <label for="ENRGY">PUT YOUR MAX ENERGY!</label>
                <input type="text" class="form-control" id="ENRGY" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/adrenaline-dose.png"width='50' height='50'> <label for="Q1">Q1 ADRENALINE?</label>
                <input type="text" class="form-control" id="Q1" placeholder="Q1 ADRENALINE">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/adrenaline-dose.png"width='50' height='50'> <label for="Q2">Q2 ADRENALINE?</label>
                <input type="text" class="form-control" id="Q2" placeholder="Q2 ADRENALINE">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/adrenaline-dose.png"width='50' height='50'> <label for="Q3">Q3 ADRENALINE?</label>
                <input type="text" class="form-control" id="Q3" placeholder="Q3 ADRENALINE">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/adrenaline-dose.png"width='50' height='50'> <label for="Q4">Q4 ADRENALINE?</label>
                <input type="text" class="form-control" id="Q4" placeholder="Q4 ADRENALINE">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/adrenaline-dose.png"width='50' height='50'> <label for="Q5">Q5 ADRENALINE?</label>
                <input type="text" class="form-control" id="Q5" placeholder="Q5 ADRENALINE">
              </div>
              <div class="form-group">
              <img src="https://www.edominations.com/public/game/items/energy-bar.png"width='50' height='50'> <label for="EB">ENERGY BARS?</label>
                <input type="text" class="form-control" id="EB" placeholder="ENERGY BARS">
              </div>
              </form>
              
       
                  </div>
                  <button class='btn btn-primary btn-block ' onclick='calculate()'>CALCULATE!!</button>
                  <button class='btn btn-danger btn-block ' onclick='clearfields()'>CLEAR!!</button>
                  <h1 class='justify-content-center' id='answer'></h1>
              </div>
            </div>
          </div>
        </div>
      </div>



   
  
      <script>
     
      var ENRGY = 0;
      var Q1 = null;
      var Q2 = null;
      var Q3 = null;
      var Q4 = null;
      var Q5 = null;
      var EB = null;
      function calculate() {
      const formatter = new Intl.NumberFormat('en-US', {
           
          })

        
  

          var ENRGY1 = document.getElementById('ENRGY').value/10;
          var Q1 = document.getElementById('Q1').value*ENRGY1*20/100;
          var Q2 = document.getElementById('Q2').value*ENRGY1*40/100;
          var Q3 = document.getElementById('Q3').value*ENRGY1*60/100;
          var Q4 = document.getElementById('Q4').value*ENRGY1*80/100;
          var Q5 = document.getElementById('Q5').value*ENRGY1/1;
          var EB = document.getElementById('EB').value*10;


          var result = (parseFloat(Q1) + parseFloat(Q2) +  parseFloat(Q3) + parseFloat(Q4) + parseFloat(Q5)+  parseFloat(EB));

          if (!isNaN(result)) {
            document.getElementById('answer').innerHTML = 'Your HIT COUNT is ' + formatter.format(result);
            $('answer').val('');
          }
}
      </script>
      <script>
      function clearfields() {
        
document.getElementById('answer').innerHTML = "";
document.getElementById('ENRGY').value = "";
document.getElementById('Q1').value = "";
document.getElementById('Q2').value = "";
document.getElementById('Q3').value = "";
document.getElementById('Q4').value = "";
document.getElementById('Q5').value = "";
document.getElementById('EB').value = "";
return;

}</script>
  </body>

</html>


@endsection
