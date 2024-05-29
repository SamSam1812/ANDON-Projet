<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class generateDbController extends Controller
{
    public function data($id)
    {
        if ($id) {
            $robotid = 1 ;

            $lastData = Info::where('session_id', $id)
                ->where('robot_id', $robotid)
                ->orderBy('created_at', 'desc')
                ->first();

            $data = [
                'session_id' => $id,
                'robot_id' => $robotid,
                'BP_Andon' =>  1,
                'NiveauAppelAndon' => 1,
                'NbPieceDebutMachine' => 0,
                'NbPieceFinMachine' => $lastData ? $lastData->NbPieceFinMachine + 5 : 5,
                'TopPiece' => $lastData ? $lastData->TopPiece + 1 : 1,
                'NbRebus' => $lastData ? $lastData->NbRebus + 1 : 1,
                'created_at' => now()
            ];

            Info::insert($data);
        }
    }
}
