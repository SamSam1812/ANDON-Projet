<?php

namespace App\Http\Controllers;
use App\Models\Session;
use App\Models\Info;
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

        $nbPieceFinMachine = Info::where('robot_id', 1)->value('NbPieceFinMachine');

        return view('homePage', ['session' => $session, 'nbPieceFinMachine' => $nbPieceFinMachine]);
        $nbPieceFinMachineRobot2 = Info::where('robot_id', 2)->value('NbPieceFinMachine');

    
        return view('homePage', ['session' => $session, 'nbPieceFinMachineRobot2' => $nbPieceFinMachineRobot2]);
    }

}
