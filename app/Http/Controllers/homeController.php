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
        $rebus = 0;
        $bpAndon1 = false;
        $bpAndon2 = false;
        $bpAndon3 = false;
        $bpAndon4 = false;
        $appel1 = 1;
        $appel2 = 1;
        $appel3 = 1;
        $appel4 = 1;

        foreach ($infos as $info) {
            // Polyprod
            if ($info->robot_id == 1) {
                $contenants = ($info->NbPieceFinMachine - $info->NbPieceDebutMachine);
                $rebus = $info->NbRebus;
                $bpAndon1 = $info->BP_Andon;
                $appel1 = $info->NiveauAppelAndon;
            }
            // Peseuse
            elseif ($info->robot_id == 2){
                $bpAndon2 = $info->BP_Andon;
                $appel2 = $info->NiveauAppelAndon;
            }
            // Regroupeur
            elseif ($info->robot_id == 3) {
                $cartons = ($info->NbPieceFinMachine - $info->NbPieceDebutMachine);
                $bpAndon3 = $info->BP_Andon;
                $appel3 = $info->NiveauAppelAndon;
            }
            // Cobot
            elseif ($info->robot_id == 4) {
                $palettes = ($info->NbPieceFinMachine - $info->NbPieceDebutMachine);
                $bpAndon4 = $info->BP_Andon;
                $appel4 = $info->NiveauAppelAndon;
            }
        }

        return response()->json([
            'nombre_contenants' => $contenants,
            'nombre_palettes' => $palettes,
            'nombre_cartons' => $cartons,
            'rebus' => $rebus,
            'bp_1' => $bpAndon1,
            'bp_2' => $bpAndon2,
            'bp_3' => $bpAndon3,
            'bp_4' => $bpAndon4,
            'appel_1' => $appel1,
            'appel_2' => $appel2,
            'appel_3' => $appel3,
            'appel_4' => $appel4,
        ]);
    }

}
