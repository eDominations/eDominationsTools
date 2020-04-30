<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisasterController extends Controller
{
    public function index(){
        return view('disaster.index');

    }
}

