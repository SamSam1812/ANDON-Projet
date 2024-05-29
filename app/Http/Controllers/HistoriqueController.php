<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriqueController extends Controller
{
    public function index()
    {
        $histos = Session::with(['infos' => function($query) {
            $query->orderBy('created_at', 'ASC');
        }])->get();
        return view('historique', compact('histos'));
    }
    public function show($id)
    {
        $session = Session::with('infos')->find($id);

        if ($session) {
            $latestInfos = $session->infos
                ->sortByDesc('created_at')
                ->unique('robot_id');

            return view('overviewSessionHisto', compact('session', 'latestInfos'));
        } else {
            return response()->json(['message' => 'Session not found'], 404);
        }
    }
}
