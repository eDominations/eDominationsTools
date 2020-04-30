<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HofController extends Controller
{
 public function index(){
        return view('hof.index');
    }
}
