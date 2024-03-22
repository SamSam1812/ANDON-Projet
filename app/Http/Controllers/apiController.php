<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Session;
class apiController extends Controller
{
    public function addData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'robot_id' => 'required',
            'NbPieceDebutMachine' => ['nullable', 'numeric'],
            'NbPieceFinMachine' => ['required', 'numeric'],
            'TopPiece' => ['nullable'],
            'BP_Andon' => 'required',
            'NbRebus' => ['required', 'numeric'],
            'NiveauAppelAndon' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false]);
        }
        
        $session = Session::where('status', Session::STATUS_IN_PROGRESS)->orderBy('id', 'desc')->first();
        if ($session) {
            Info::create([
                'session_id' => $session->id,
                'robot_id' => $request->get('robot_id'),
                'NbPieceDebutMachine' => $request->get('NbPieceDebutMachine'),
                'NbPieceFinMachine' => $request->get('NbPieceFinMachine'),
                'TopPiece' => $request->get('NbPieceFinMachine'),
                'BP_Andon' => $request->get('BP_Andon'),
                'NbRebus' => $request->get('NbRebus'),
                'NiveauAppelAndon' => $request->get('NiveauAppelAndon'),
            ]);
    
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false]);
    }
}




