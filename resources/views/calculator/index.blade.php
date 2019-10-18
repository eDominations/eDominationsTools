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
        </nav></div>
    
<body>

<div class='col-md-8 col-md-offset-2'>
<div class='panel panel-default'>
<div class='panel-heading'>CALCULATOR</div>
<div class='panel-body'><form>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="search">ID OR NAME</label>
      <input type="text" name='search' class='form-control' id='search' placeholder='PUT YOUR ID OR NAME , IT WILL BE AUTOCOMPLETED..'>
    </div></div>
    <fieldset disabled>
  <div class="form-group col-md-2">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name">
  </div>
    <div class="form-group col-md-2">
      <label for="level">LEVEL</label>
      <input type="text" class="form-control" id="level" placeholder="LEVEL">
    </div>
    <div class="form-group col-md-2">
      <label for="strength">STR</label>
      <input type="text" class="form-control" id="strength" placeholder="STRENGTH">
    </div>
    <div class="form-group col-md-2">
      <label for="dmg">DMG1HIT</label>
      <input type="text" class="form-control" id="dmg" placeholder="DMG ON 1 HIT">
    </div>
    <div class="form-group col-md-2">
    <label for="edomid">RANK</label>
    <input type="text" class="form-control" id="rank" placeholder="Military RANK">
  </div>
  </fieldset></form>

  <div class="input-group mb-3">
  <div class="input-group-prepend col-md-3">
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


 
<div class="form-group col-md-3 ">
    <label for="HIT">HIT</label>
    <input type="text" class="form-control" id="HIT" placeholder="HOW MANY HIT?"></div> 
    
    <div class="form-group col-1"></div>  
  <div class="input-group-prepend col-md-3">
  <select class="custom-select" id="defensesystem">
    <option selected>DEFENSE SYSTEM Q?</option>
    <option value="1">Q0 (NO DEFENSE SYSTEM)</option>
    <option value="0.97">Q1</option>
    <option value="0.95">Q2</option>
    <option value="0.93">Q3</option>
    <option value="0.89">Q4</option>
    <option value="0.85">Q5</option>
  </select></div> 
 
  
      <div class="input-group-prepend col-3">
  <select class="custom-select" id="naturalenemy">
    <option selected>NE?</option>
    <option value="1">NO</option>
    <option value="1.1">YES</option>
  </div></div></select>
 
  </div>
  <div class="input-group-prepend col-5">
  <select class="custom-select" id="weapon">
    <option selected>SELECT YOUR WEAPON Q?</option>
    <option value="1">SLAPPP!</option>V
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
  </select>
  </div></div>
   </form>
    <h1 id='answer'></h1>

<button onclick='calculate()'>CALCULATE!!</button>



</div> </div> </div> 

<script type='text/javascript'>
    
   
    $('#search').autocomplete({
        source: "{{ URL::to('calculator-search')}}",
        minLenght: 3,
        select:function(key,value)
        {
        
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

function calculate()
{
    const formatter = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 2
})
    var field1=document.getElementById('dmg').value;
    var field2=document.getElementById('defensesystem').value;
    var field3=document.getElementById('booster').value;
    var field4=document.getElementById('naturalenemy').value;
    var field5=document.getElementById('HIT').value;
    var field6=document.getElementById('weapon').value;

    

    var result=(parseFloat(field1)*parseFloat(field3)*parseFloat(field6)*parseFloat(field4)*parseFloat(field2)*parseFloat(field5));
    
        if(!isNaN(result))
    {
        document.getElementById('answer').innerHTML='Your DMG IS '+formatter.format(result);
    }
}

</script>
</body></html>


@endsection