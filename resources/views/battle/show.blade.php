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
        <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/css/style3.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style>
    .h1 .br h1 br{
        background-color: rgb(165, 173, 169);  
        color: rgb(165, 173, 169);
    }</style>
</head> 
    
   
   <body>        <div class="menu-wrap">
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

<?php
$GetBTL = new Endpointsv2($uriSegments[2]);
foreach($GetBTL->getBattles()[0] as $rrw)
 ?>

   <div class="row">
        <div class="col-lg-6">
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
        <div class="col-lg-1"></div>
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
    
        <table class='table table-striped table-bordered table-light battletable ' style="width 100%">
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
        <table class='table table-striped table-bordered table-light battletable2 ' style="width 100%">
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
         </div></div> </div></div></div>





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
