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
    }

    public function getData($sessionId)
    {
        $infos = Info::where('session_id', $sessionId)->get();

        $contenants = 0;
        $palettes = 0;
        $cartons = 0;

        foreach ($infos as $info) {
            if ($info->robot_id == 1) {
                $contenants += $info->NbPieceFinMachine;
            } elseif ($info->robot_id == 2) {
                $palettes += $info->NbPieceFinMachine;
            } elseif ($info->robot_id == 4) {
                $cartons += $info->NbPieceFinMachine;
            }
        }

        return response()->json([
            'nombre_contenants' => $contenants,
            'nombre_palettes' => $palettes,
            'nombre_cartons' => $cartons
        ]);
    }

}
