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
$getsomething = new Endpointsv2($uriSegments[2]);?>

    <?php DB::table('battledamage')->delete();?>
    <?php foreach ($getsomething->getBattleDamage('') as $obj)  {
                foreach ($obj as $key => $value) {
                    $insertArr[str_slug($key,'')] = $value;
                } 
                
                 DB::table('battledamage')->updateOrInsert(
                    array('ID'=>$insertArr['id'],'name'=>$insertArr['name'],'side'=> $insertArr['side'],'dmg' => $insertArr['dmg'],'hits' => $insertArr['hits'],'unit' => $insertArr['unit']),
                    array('ID'=>$insertArr['id'],'name'=>$insertArr['name'],'side'=> $insertArr['side'],'dmg' => $insertArr['dmg'],'hits' => $insertArr['hits'],'unit' => $insertArr['unit'])
                );}?>
           
        
    <?php
$battleDef = DB::table('battledamage')->where('SIDE','defense')->SUM('DMG');
$battleAttack = DB::table('battledamage')->where('SIDE','attack')->SUM('DMG');
$battleDefH = DB::table('battledamage')->where('SIDE','defense')->SUM('Hits');
$battleAttackH = DB::table('battledamage')->where('SIDE','attack')->SUM('Hits');
$battleDefC = DB::table('battledamage')->where('SIDE','defense')->count();
$battleAttackC = DB::table('battledamage')->where('SIDE','attack')->count();
$battleDef2 = DB::table('battledamage')->where('SIDE','defense')->get();
$battleAtt = DB::table('battledamage')->where('SIDE','attack')->get();?>



    <!DOCTYPE html>
    <html>
  
        <title>
            eDominations-Tools
        </title>
    
    <link rel="stylesheet" href="/css/bootstrap.min.css" >
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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
                <a href="/shame">SHAME-WALL</a>
                </li>
             </ul>
        </nav></div>

<?php
$GetBTL = new Endpointsv2($uriSegments[2]);
foreach($GetBTL->getBattles()[0] as $rrw)
 ?>

   <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-1">
          <div class="col-lg-12"  style="border:1px;">
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
    
        <table class='table table-striped table-bordered battletable ' style="width 100%">
          <thead>
      
          <tr>  <th>Picture</th>
                <th>NAME</th>
                <th>MU DETAILS</th>
                <th>DMG</th>
                <th>HITS</th>
               
          </tr>        
          </thead>
          <tbody>

      




        
<?php

        foreach ($battleAtt as $obj5)
        
         echo 
     "<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj5->ID.".jpg' width='40' height='40'>"."</td>" 
     ."<td><a href='https://www.edominations.com/en/profile/".$obj5->ID."'>" .$obj5->Name."</td></a>"
     .'<td><a href="/battle-mu/'.$uriSegments[2].'" class="btn btn-dark btn-lg">'.'Mu Details'.'</a></td>'  
     ."<td>".number_format($obj5->DMG)."</td>"
     ."<td>".$obj5->Hits."</td></tr>";?>
          </tbody>
          </table>
         </div>
        
        



<div class='col-4'>
        <table class='table table-striped table-bordered battletable2 ' style="width 100%">
          <thead>      
          <tr>  <th>Picture</th>
                <th>NAME</th>
                <th>MU DETAILS</th>
                <th>DMG</th>
                <th>HITS</th>            
          </tr>        
          </thead>
          <tbody>
          <?php foreach ($battleDef2 as $obj4)  
 echo 
"<tr><td><img src='https://www.edominations.com/public/upload/citizen/".$obj4->ID.".jpg' width='40' height='40'>"."</td>" 
."<td><a href='https://www.edominations.com/en/profile/".$obj4->ID."'>" .$obj4->Name."</td></a>"
.'<td><a href="/battle-mu/'.$uriSegments[2].'" class="btn btn-dark btn-lg">'.'Mu Details'.'</a></td>' 
."<td>".number_format($obj4->DMG)."</td>"
."<td>".$obj4->Hits."</td>";?>
  
          
          </tbody>       
          </table>
         </div></div> </div>





</body>
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
          
    

        </html>


@section('footer')

@endsection