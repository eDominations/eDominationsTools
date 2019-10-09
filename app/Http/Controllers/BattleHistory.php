<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BattleHistory extends Controller
{
    public function index(){
        return view('battle-history.index');

    }
}
