<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NodeRedDataController extends Controller
{
    public function store(Request $request)
    {


        $nodeRedData = new NodeRedData();
        $nodeRedData->data = $request->all();
        $nodeRedData->save();

    }
}
