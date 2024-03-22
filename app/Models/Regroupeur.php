<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regroupeur extends Model
{
    use HasFactory;
    protected $table = 'regroupeur';
    protected $primaryKey = 'id'; 
    public $timestamps = false; 
    
    protected $fillable = [
        'i_NbPieceDebutMachine',
        'i_NbPieceFinMachine',
        'x_TopPiece',
        'IHM_x_BP_Andon',
        'i_NbRebus',
        'IHM_i_NiveauAppelAndon',
        'id_session',
    ];
}
