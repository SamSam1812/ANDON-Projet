<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index()
    {
        $histos = Session::all();
        return view('historique', compact('histos'));
    }
}
