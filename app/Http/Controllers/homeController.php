<?php

namespace App\Http\Controllers;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\ContainersProduced;

class homeController extends Controller
{

    public function index()
    {
        return view('notSession');
    }
    public function sessionStart($id)
    {
        $session = Session::findOrFail($id);
        $session->created_at = Carbon::parse($session->created_at);

        return view('homePage', ['session' => $session]);
    }

}
