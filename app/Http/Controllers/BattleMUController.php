<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BattleMUController extends Controller
{
    public function index(){
        return view('battle-mu.index');

    }

    public function show()
    {
        return view('battle-mu.index');
    }
}