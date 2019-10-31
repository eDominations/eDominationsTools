<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuPlayerController extends Controller
{
    public function index(){
        return view('Military-Unit.index');
    }
}

