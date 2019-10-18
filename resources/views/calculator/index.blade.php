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
        <li>
          <a href="/calculator">Calculator</a>
        </li>
        <li>
          <a href="/shame">SHAME-WALL</a>
        </li>
      </ul>
    </nav>
  </div>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading ">CALCULATOR</div>
            <div class="panel-body panel2">
              <div class="row">
                <div class="col-md-6 col-xs-12"> <label for="search">ID OR NAME</label>
                  <input type="text" name='search' class='form-control' id='search' placeholder='PUT YOUR ID OR NAME , IT WILL BE AUTOCOMPLETED..'></div>
              
              <fieldset disabled>
                <div class="form-group col-md-3 col-xs-12">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group col-md-2 col-xs-12">
                  <label for="level">LEVEL</label>
                  <input type="text" class="form-control" id="level" placeholder="LEVEL">
                </div>
                <div class="form-group col-md-2 col-xs-12">
                  <label for="strength">STR</label>
                  <input type="text" class="form-control" id="strength" placeholder="STRENGTH">
                </div>
                <div class="form-group col-md-3 col-xs-12">
                  <label for="dmg">DMG1HIT</label>
                  <input type="text" class="form-control" id="dmg" placeholder="DMG ON 1 HIT">
                </div>
                <div class="form-group col-md-2 col-xs-12">
                  <label for="edomid">RANK</label>
                  <input type="text" class="form-control" id="rank" placeholder="Military RANK">
                </div>
              </fieldset>
              
              <div class="input-group-prepend col-md-3 col-xs-12 booster2">
                <select class="custom-select" id="booster">
                  <option selected>SELECT YOUR BOOSTER Q?</option>
                  <option value="1">Q0 (NO BOOSTER)</option>
                  <option value="1.1">Q1</option>
                  <option value="1.2">Q2</option>
                  <option value="1.3">Q3</option>
                  <option value="1.4">Q4</option>
                  <option value="1.5">Q5</option>
                </select>
              </div>

              <div class="form-group col-md-2 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="HOW MANY HIT?">
              </div>

              <div class="input-group-prepend col-md-3 col-xs-12">
                <select class="custom-select" id="defensesystem">
                  <option selected>DEFENSE SYSTEM Q?</option>
                  <option value="1">Q0 (NO DEFENSE SYSTEM)</option>
                  <option value="0.97">Q1</option>
                  <option value="0.95">Q2</option>
                  <option value="0.93">Q3</option>
                  <option value="0.89">Q4</option>
                  <option value="0.85">Q5</option>
                </select>
              </div>
              
              <div class="col-md-3 col-xs-12">
                <label for='naturalenemy' class="inlinelabel">
                  Natural Enemy +%10</label>
                <input type="checkbox" id="naturalenemy" value='1.1' />
              </div>
              <div class="input-group-prepend col-md-4 col-xs-12 weaptab">
                  <select class="custom-select" id="weapon">
                    <option selected value='1'>SELECT YOUR WEAPON Q?</option>
                    <option value="1.2">WEAPON Q1</option>
                    <option value="1.4">WEAPON Q2</option>
                    <option value="1.6">WEAPON Q3</option>
                    <option value="1.8">WEAPON Q4</option>
                    <option value="2">WEAPON Q5</option>
                    <option value="1.6">TANK Q1</option>
                    <option value="1.8">TANK Q2</option>
                    <option value="2.2">TANK Q3</option>
                    <option value="2.6">TANK Q4</option>
                    <option value="3">TANK Q5</option>
                    <option value="2.6">AIR Q1</option>
                    <option value="2.8">AIR Q2</option>
                    <option value="3">AIR Q3</option>
                    <option value="3.5">AIR Q4</option>
                    <option value="4">AIR Q5</option>
                    <option value="5">MORTAR</option>
                    <option value="4">AK-47</option>
                    <option value="6">PANZER</option>
                    <option value="8">FALCON</option>
                  </select>
                  </div>
                  <div class="input-group-prepend col-md-3 col-xs-12">
                <select class="custom-select" id="mutrait">
                  <option selected>Your Mu LVL Bonus?</option>
                  <option value="1">Novice %0</option>
                  <option value="1.02">Regular %2</option>
                  <option value="1.04">Veteran %4</option>
                  <option value="1.07">Elite %7</option>
                  <option value="1.1">Legendary %10</option>
                </select>
              </div>
              <div class="col-md-2 col-xs-12 mubon">
                <label for='special' class="inlinelabel">
                  %3 DO BONUS?</label>
                <input type="checkbox" id="special" value='1.03' />
              </div>
             <div class="input-group-prepend col-md-3 col-xs-12 epic">                
                <input type="checkbox" id="epic" value='1.1' />
                <label for='epic' class="inlinelabel">
                  EPIC BATTLE?</label>
              </div>
              </div>
              <div class="row">
              <form class="was-validated">
              <div class="custom-control custom-radio col-md-3 col-xs-12">
              <label for='customControlValidation2' class="inlinelabel">
                  WARRIOR PACK?</label>
                  </div>
                  <div class="custom-control custom-radio col-md-4 col-xs-12">
    <input type="radio" class="custom-control-input" id="customControlValidation2" value='1' name="radio-stacked" required>
    <label class="custom-control-label" for="customControlValidation2">NO.</label>
  </div>
     <div class="custom-control custom-radio col-md-4 col-xs-12">
    <input type="radio" class="custom-control-input" id="customControlValidation4" value='1.2' name="radio-stacked" required>
    <label class="custom-control-label" for="customControlValidation4">MEDIUM</label>
  </div>
  <div class="custom-control custom-radio col-md-4 col-xs-12">
    <input type="radio" class="custom-control-input" id="customControlValidation3" value='1.15' name="radio-stacked" required>
    <label class="custom-control-label" for="customControlValidation3">SMALL</label>
    </div>
  <div class="custom-control custom-radio col-md-4 col-xs-12">
    <input type="radio" class="custom-control-input" id="customControlValidation5" value='1.3' name="radio-stacked" required>
    <label class="custom-control-label" for="customControlValidation5">LARGE</label>
    </div>
</form>
              
              </div>      
                  </div>
                  <button class='btn btn-primary btn-block ' onclick='calculate()'>CALCULATE!!</button>
                  <button class='btn btn-danger btn-block ' onclick='clearfields()'>CLEAR!!</button>
                  <h1 id='answer'></h1>
              </div>
            </div>
          </div>
        </div>
      </div>



      <script type='text/javascript'>
        $('#search').autocomplete({
          source: "{{ URL::to('calculator-search')}}",
          minLenght: 3,
          select: function(key, value) {

            $('#edomid').val(value.item.ID)
            $('#name').val(value.item.value)
            $('#level').val(value.item.level)
            $('#strength').val(value.item.STR)
            $('#rank').val(value.item.Rank)
            $('#dmg').val(value.item.dmg)
          }
        })

      </script>
  
      <script>
     
      var field4 = 1;
      function calculate() {
      const formatter = new Intl.NumberFormat('en-US', {
           
          })

        
        if($("input#naturalenemy").is(":checked")){
          field4 = parseFloat($("input#naturalenemy").val());
        }
          else{
          field4= 1;
    }
    if($("input#special").is(":checked")){
          field7 = parseFloat($("input#special").val());
        }
          else{
          field7= 1;
    }
    if($("input#epic").is(":checked")){
          field8 = parseFloat($("input#epic").val());
        }
          else{
          field8= 1;
    }

    if($("input#customControlValidation3").is(":checked")){
          field10 = parseFloat($("input#customControlValidation3").val());
        }
          else{
          field10= 1;
    }
    if($("input#customControlValidation4").is(":checked")){
          field11 = parseFloat($("input#customControlValidation4").val());
        }
          else{
          field11= 1;
    }
    if($("input#customControlValidation5").is(":checked")){
          field12 = parseFloat($("input#customControlValidation5").val());
        }
          else{
          field12= 1;
    }

          var field1 = document.getElementById('dmg').value;
          var field2 = document.getElementById('defensesystem').value;
          var field3 = document.getElementById('booster').value;
          var field5 = document.getElementById('HIT').value;
          var field6 = document.getElementById('weapon').value;
          var field9 = document.getElementById('mutrait').value;


          var result = (parseFloat(field1) * parseFloat(field3) * parseFloat(field6) *  parseFloat(field2) * parseFloat(field5)*  field7*  field4*  field8* field11* field12* field10*  field9);

          if (!isNaN(result)) {
            document.getElementById('answer').innerHTML = 'Your DMG IS ' + formatter.format(result);
            $('answer').val('');
          }
}
      </script>
      <script>
      function clearfields() {
        
document.getElementById('answer').innerHTML = "";
return;

}</script>
  </body>

</html>


@endsection
