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
                'BP_Andon' =>  0,
                'NiveauAppelAndon' => 1,
                'NbPieceDebutMachine' => 0,
                'NbPieceFinMachine' => $lastData ? $lastData->NbPieceFinMachine + 1 : 0,
                'TopPiece' => $lastData ? $lastData->TopPiece + 1 : 0,
                'NbRebus' => $lastData ? $lastData->NbRebus + 1 : 0,
                'created_at' => now()
            ];

            Info::insert($data);
        }
    }
    public function dataRegroupeur($id)
    {
        if ($id) {
            $robotid = 3 ;

            $lastData = Info::where('session_id', $id)
                ->where('robot_id', $robotid)
                ->orderBy('created_at', 'desc')
                ->first();

            $data = [
                'session_id' => $id,
                'robot_id' => $robotid,
                'BP_Andon' =>  0,
                'NiveauAppelAndon' => 1,
                'NbPieceDebutMachine' => 0,
                'NbPieceFinMachine' => $lastData ? $lastData->NbPieceFinMachine + 1 : 0,
                'TopPiece' => $lastData ? $lastData->TopPiece + 1 : 0,
                'NbRebus' => $lastData ? $lastData->NbRebus + 1 : 0,
                'created_at' => now()
            ];

            Info::insert($data);
        }
    }
    public function dataPaletisation($id)
    {
        if ($id) {
            $robotid = 4 ;

            $lastData = Info::where('session_id', $id)
                ->where('robot_id', $robotid)
                ->orderBy('created_at', 'desc')
                ->first();

            $data = [
                'session_id' => $id,
                'robot_id' => $robotid,
                'BP_Andon' =>  0,
                'NiveauAppelAndon' => 1,
                'NbPieceDebutMachine' => 0,
                'NbPieceFinMachine' => $lastData ? $lastData->NbPieceFinMachine + 1 : 0,
                'TopPiece' => $lastData ? $lastData->TopPiece + 1 : 0,
                'NbRebus' => $lastData ? $lastData->NbRebus + 1 : 0,
                'created_at' => now()
            ];

            Info::insert($data);
        }
    }
}
