<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Info;
use App\Models\Session;
class apiController extends Controller
{
    public function addData(Request $request)
    {

        $session = Session::where('status', Session::STATUS_IN_PROGRESS)->orderBy('id', 'desc')->first();
        if ($session) {
            $ip = $request->ip();
            $data = $request->all();

            if($data) {
                $robotId = DB::table('robots')
                    ->where('ip_robot', $ip)
                    ->value('id_robot');
                Info::Create(
                    [
                        'robot_id' => $robotId,
                        'session_id' => $session->id,
                        'NbPieceDebutMachine' => $data['NbPieceDebutMachine'][0],
                        'NbPieceFinMachine' => $data['NbPieceFinMachine'][0],
                        'TopPiece' => $data['TopPiece'][0],
                        'BP_Andon' => $data['BP_Andon'][0],
                        'NbRebus' => $data['NbRebus'][0],
                        'NiveauAppelAndon' => $data['NiveauAppelAndon'][0],
                    ]
                );
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Data format is incorrect or missing.']);
            }
        }

        return response()->json(['success' => false]);
    }
}




