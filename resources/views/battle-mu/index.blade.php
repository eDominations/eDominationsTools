@extends('master')

<?php
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$getsomething = new Endpointsv2($uriSegments[2]);
?>
    <?php
$battleDef = DB::table('battledamage')->where('SIDE','defense')->SUM('DMG');
$battleAttack = DB::table('battledamage')->where('SIDE','attack')->SUM('DMG');
$battleDefH = DB::table('battledamage')->where('SIDE','defense')->SUM('Hits');
$battleAttackH = DB::table('battledamage')->where('SIDE','attack')->SUM('Hits');
$battleDefC = DB::table('battledamage')->where('SIDE','defense')->count();
$battleAttackC = DB::table('battledamage')->where('SIDE','attack')->count();

$battleMu2= DB::select('SELECT  MilitaryUnit , SUM(DMG) AS damage , battledamage.Unit , SUM(Hits) AS hit , Country
from  mudetails
INNER JOIN battledamage  ON mudetails.ID = battledamage.Unit 
WHERE Side="attack"
GROUP BY Unit , mudetails.MilitaryUnit, Country');

$battleMu3= DB::select('SELECT  MilitaryUnit , SUM(DMG) AS damage , battledamage.Unit , SUM(Hits) AS hit , Country
from  mudetails
INNER JOIN battledamage  ON mudetails.ID = battledamage.Unit 
WHERE Side="defense"
GROUP BY Unit , mudetails.MilitaryUnit, Country');
?>

    <!DOCTYPE html>
    <html>
    <head>
<link rel="stylesheet" href="/css/style3.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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
		<li><a href="/hof">Hall Of Fame</a></li>
<li><a href='/disaster'>Disasters</a></li>
            <li><a href="/shame">Shame-Wall</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    </head>
    <body>


<?php
$GetBTL = new Endpointsv2($uriSegments[2]);
foreach($GetBTL->getBattles()[0] as $rrw)

 ?>

   <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-1">
     
          <div class="col-lg-12"  style="border:1px;">
          <a href= <?php echo '"/battle/'.$uriSegments[2].'"'?>  class="btn btn-dark btn-lg">BACK TO PLAYER BASED DETAILS</a>
            <h1 class="text-center"> 
            <td><img src=<?php echo '"/img/flags/'.$rrw['AttackerSlug'].'.png"'; ?> width='120' height='120'></td>
              <br><strong> <?php echo $rrw['Attacker'];  ?> </br></strong>
            </h1>
          </div>
          <div class="col-lg-12"><strong><p class="text-center"> Total DMG:  <?php echo number_format($battleAttack) ?> 
            <br>Total Hits: <?php echo number_format($battleAttackH) ?> 
            <br>Total Players Hitted: <?php echo number_format($battleAttackC) ?> </strong></br></p>
          </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
          <div class="col-lg-12"> 
            <h1 class="text-center"> 
            <td><img src=<?php echo '"/img/flags/'.$rrw['DefenderSlug'].'.png"'; ?> width='120' height='120'></td>
            <br><strong><?php echo $rrw['Defender'];  ?></br></strong></h1>
          </div>
          <div class="col-lg-12">
            <strong><p class="text-center"> Total DMG:  <?php echo number_format($battleDef) ?> 
            <br>Total Hits: <?php echo number_format($battleDefH)?> 
            <br>Total Players Hitted: <?php echo number_format($battleDefC) ?> </strong></br></p>
          </div>
        </div>
      </div>

    <div class="row justify-content-around">
    <div class="col-4">
    
        <table class='table table-light table-bordered battletable ' style="width 100%">
          <thead>
      
          <tr>  <th>Picture</th>
                <th>NAME</th>
                <th>DMG</th>
                <th>HITS</th>
                <th>COUNTRY</th>
               
          </tr>        
          </thead>
          <tbody>

      




        
<?php

foreach ($battleMu2 as $obj5)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/group/".$obj5->Unit.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/military-unit/".$obj5->Unit."'>" .$obj5->MilitaryUnit."</td></a>"
."<td>".number_format($obj5->damage)."</td>"
."<td>".number_format($obj5->hit)."</td>"
."<td><img src='/img/flags2/".str_replace(" ", "-",$obj5->Country).".png' width='50' height='50'>"."</td></tr>";
    
 
  ?>

          
          </tbody>
          </table>
         </div>
        
        



<div class='col-4'>
        <table class='table table-light table-bordered battletable2 ' style="width 100%">
          <thead>
      
          <tr>
                <th>Picture</th>
                <th>NAME</th>
                <th>DMG</th>
                <th>HITS</th>
                <th>COUNTRY</th>
            
          </tr>        
          </thead>
          <tbody>
          <?php
foreach ($battleMu3 as $obj6)
        
echo 
"<tr><td><img src='https://www.edominations.com/public/upload/group/".$obj6->Unit.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/military-unit/".$obj6->Unit."'>" .$obj6->MilitaryUnit."</td></a>"
."<td>".number_format($obj6->damage)."</td>"
."<td>".number_format($obj6->hit)."</td>"
."<td><img src='/img/flags2/".str_replace(" ", "-",$obj6->Country).".png' width='50' height='50'>"."</td></tr>";

?>
  
          
          </tbody>       
          </table>
         </div></div> </div>






        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script>$('.battletable').DataTable({
            order: [[3,'desc']],
            pagingType: 'full_numbers',
            lengthMenu: [[12,25,35,50,-1],[12,25,35,50,'ALL']]});
        </script>
        <script>$('.battletable2').DataTable({
            order: [[3,'desc']],
            pagingType: 'full_numbers',
            lengthMenu: [[12,25,35,50,-1],[12,25,35,50,'ALL']]
            
        });</script>
          </body>
    

        </html>
