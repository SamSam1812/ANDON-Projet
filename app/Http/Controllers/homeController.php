<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class homeController extends Controller
{

    public function index()
    {
        $now = Carbon::now();
        $date = $now->format('d/m/Y');
        $heure = $now->format('H:i');
        return view('homePage', ['date' => $date, 'heure' => $heure]);
    }

}
