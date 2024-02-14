<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    public function index(){
        return view('session');
    }
}
