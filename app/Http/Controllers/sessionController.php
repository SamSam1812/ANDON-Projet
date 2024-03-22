<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class sessionController extends Controller
{

    public function index(){
        return view('session');
    }


    public function stop($id)
    {

        $production = Session::findOrFail($id);

        $production->status = Session::STATUS_COMPLETED;
        $production->save();

        return redirect()->route('home.page');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nbr_operateur' => 'required|integer',
            'nbr_palette' => 'required|integer',
            'nbr_cartons' => 'required|integer',
            'nbr_contenant' => 'required|integer',
            'estimatedTime' => 'required|date_format:H:i',
        ]);

        $production = new Session();
        $production->nbr_operateur = $validatedData['nbr_operateur'];
        $production->nbr_palette = $validatedData['nbr_palette'];
        $production->nbr_cartons = $validatedData['nbr_cartons'];
        $production->nbr_contenant = $validatedData['nbr_contenant'];
        $production->estimatedTime = $validatedData['estimatedTime'];

        $production->status = Session::STATUS_IN_PROGRESS;

        $production->save();

        return response()->json(['success' => true, 'redirect' => route('home.session.page', ['id' => $production->id])]);
    }

}
