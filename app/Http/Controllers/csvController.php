<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use League\Csv\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;

class csvController extends Controller
{
    public function exportCsv($id)
    {
        $infos = Info::with('robot')->where('session_id', $id)->get();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['id', 'ID de la session', 'Nom du robot', 'Nombre fin', 'Top piece', 'BP Andon', 'Nombre de rebus',
            'Appel Andon' ]);
        foreach ($infos as $info) {
            $sessionId = $info->session_id;
            $robotName = $info->robot ? $info->robot->name_robot : 'Robot non trouvé';
            $nbrFinPiece = $info->NbPieceFinMachine;
            $TopPiece = $info->TopPiece;
            $BP_Andon = $info->BP_Andon;
            $nbRebus = $info->NbRebus;
            $appelAndon = $info->NiveauAppelAndon;
            $date = $info->created_at;
            $csv->insertOne([$sessionId, $robotName, $nbrFinPiece, $TopPiece, $BP_Andon, $nbRebus, $appelAndon, $date ]);
        }
        return new StreamedResponse(function () use ($csv) {
            $csv->output('export.csv');
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export.csv"',
        ]);
    }
}
