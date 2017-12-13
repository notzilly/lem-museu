<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuseuController extends Controller
{
    public function index(){
        return view('museu.index');
    }
}
