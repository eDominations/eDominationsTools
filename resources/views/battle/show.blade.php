

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

    <?php DB::table('battledamage')->delete();?>

    <?php
            
            foreach ($getsomething->getBattleDamage('') as $obj)  {
                foreach ($obj as $key => $value) {
                    $insertArr[str_slug($key,'')] = $value;
                } 
                
                 DB::table('battledamage')->updateOrInsert(
                    array('ID'=>$insertArr['id'],'name'=>$insertArr['name'],'side'=> $insertArr['side'],'dmg' => $insertArr['dmg'],'hits' => $insertArr['hits'],'unit' => $insertArr['unit']),
                    array('ID'=>$insertArr['id'],'name'=>$insertArr['name'],'side'=> $insertArr['side'],'dmg' => $insertArr['dmg'],'hits' => $insertArr['hits'],'unit' => $insertArr['unit'])
                );            
            }
        ?>
           
        
    <?php
$battleDef = DB::table('battledamage')->where('SIDE','defense')->SUM('DMG');
$battleAttack = DB::table('battledamage')->where('SIDE','attack')->SUM('DMG');
$battleDefH = DB::table('battledamage')->where('SIDE','defense')->SUM('Hits');
$battleAttackH = DB::table('battledamage')->where('SIDE','attack')->SUM('Hits');
$battleDefC = DB::table('battledamage')->where('SIDE','defense')->count();
$battleAttackC = DB::table('battledamage')->where('SIDE','attack')->count();
$battleDef2 = DB::table('battledamage')->where('SIDE','defense')->get();
$battleAtt = DB::table('battledamage')->where('SIDE','attack')->get();
?>



<div class="container-fluid">
eDominations
</div>
    <!DOCTYPE html>
    <html>
    <head>
    <title>BattleDetails</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    </head>
    <body>

<?php
$GetBTL = new Endpointsv2($uriSegments[2]);
foreach($GetBTL->getBattles()[0] as $rrw)
 ?>

    <div class="container">
    <div class="row lg-12">
        <div class="col-lg-0"  style="border:1px;"><h1 class=text-right><?php 
        echo 
        "<td><img src='/img/flags2/".$rrw['AttackerSlug'].".png' width='120' height='120'>"."</td>"
        ."<br><strong>".$rrw['Attacker']."</br></strong>" ?></h1></div>
        <div class="col-lg-0"></div>
        <div class="col-lg-9" style="border:1px;"><strong><p class=text-left> Total DMG:  <?php echo number_format($battleDef) ?> 
        <br>Total Hits: <?php echo number_format($battleDefH) ?> 
        <br>Total Players Hitted: <?php echo number_format($battleDefC) ?> </strong></br></p></div>
        <div class="col-lg-0" style="border:1px;">
        
        
        </div>
        <div class="col-lg-4" style="border:1px;">
        <h1 class=text-right><?php 
        echo 
        "<td><img src='/img/flags2/".$rrw['DefenderSlug'].".png' width='120' height='120'>"."</td>"
        ."<br><strong>".$rrw['Defender']."</br></strong>" ?></h1>
        <strong><p class=text-left> Total DMG:  <?php echo number_format($battleAttack) ?> 
        <br>Total Hits: <?php echo number_format($battleAttackH) ?> 
        <br>Total Players Hitted: <?php echo number_format($battleAttackC) ?> </strong></br></p>
        </div>
    </div>
</div>

    <div class="row justify-content-around">
    <div class="col-4">
    
        <table class='table table-striped table-bordered battletable ' style="width 100%">
          <thead>
      
          <tr>  <th>Picture</th>
                <th>NAME</th>
                <th>ID</th>
                <th>DMG</th>
                <th>HITS</th>
               
          </tr>        
          </thead>
          <tbody>

      

       
          <?php
        
        foreach ($battleAtt as $obj5)  
         echo 
     "<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj5->ID.".jpg' width='40' height='40'>"."</td>" 
     ."<td>".$obj5->Name."</td>"
     ."<td>".$obj5->ID."</td>" 
     ."<td>".number_format($obj5->DMG)."</td>"
     ."<td>".$obj5->Hits."</td></tr>";
 
  ?>
  
          
          </tbody>
          </table>
         </div>
        
        



<div class='col-4'>
        <table class='table table-striped table-bordered battletable2 ' style="width 100%">
          <thead>
      
          <tr>
                <th>Picture</th>
                <th>NAME</th>
                <th>ID</th>
                <th>DMG</th>
                <th>HITS</th>
            
          </tr>        
          </thead>
          <tbody>
          <?php

foreach ($battleDef2 as $obj4)  
 echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj4->ID.".jpg' width='40' height='40'>"."</td>" 
."<td>".$obj4->Name."</td>"
."<td>".$obj4->ID."</td>" 
."<td>".number_format($obj4->DMG)."</td>"
."<td>".$obj4->Hits."</td>";


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