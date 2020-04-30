<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Shame extends Controller
{
    public function index(){
        return view('shame.index');
    }
}
