<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
   public function index()
   {
       return view('index.php');
   }

   public function search(Request $request)
   {
        $search = $request->term;
        $player= DB::table('players')->where('ID','LIKE','%'.$search.'%')->orWhere('Name','LIKE','%'.$search.'%')->get();

        $data = [];

        foreach($player as $key  => $value) {
            $data [] = ['ID' =>$value->ID, 'value'=>$value->Name, 'level'=>$value->Level, 'STR'=>$value->Strength, 'Rank'=>$value->MilitaryRank, 'dmg'=>$value->DMG1HIT];
        }
        
        return response($data);
   }
}
