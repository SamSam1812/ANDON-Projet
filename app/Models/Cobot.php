<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobot extends Model
{
    use HasFactory;
    protected $table = 'cobot';
    protected $primaryKey = 'id'; 
    public $timestamps = false; 
    
    protected $fillable = [
        'IHM_x_BP_Andon',
        'IHM_i_NiveauAppelAndon',
        'x_TopPiece',
        'i_NbPalette',
        'i_NbCartonsFlacons',
        'i_NbCartonsPots',
        'id_session',
    ];
}
