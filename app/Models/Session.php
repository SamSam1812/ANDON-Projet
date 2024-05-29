<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    const STATUS_IN_PROGRESS = 'en cours';
    const STATUS_COMPLETED = 'terminé';

    protected $fillable = [
        'nbr_operateur',
        'nbr_palette',
        'nbr_contenant',
        'nbr_cartons',
        'estimatedTime',
        'status',
        'name_chief',
    ];

    public function infos()
    {
        return $this->hasMany(Info::class, 'session_id');
    }

}
