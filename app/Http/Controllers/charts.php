<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Helpers\Endpointsv2;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class charts extends Controller
{

    public function create(){
        $items = DB::table('countryname')->pluck('NAME','ID');
    }


    public function index(){


        $items = DB::table('countryname')->pluck('NAME','ID');

        return view('charts.index',compact('items'));
    }
}
