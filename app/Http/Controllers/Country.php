<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Country extends Controller
{
    public function index(){
        return view('country.index');
}
}
