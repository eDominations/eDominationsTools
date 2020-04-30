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
            <div class="panel-heading ">CALCULATOR</div>
            <div class="panel-body panel2">
              <div class="row">
              <div class=" col-md-6 col-xs-6">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="row">
              </div>
              <form>
                   <div class=" col-md-6 col-xs-6">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
              </div>
              <div class="form-group col-md-6 col-xs-12">
                <input type="text" class="form-control" id="HIT" placeholder="YOUR MAX ENERGY?">
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
