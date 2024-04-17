<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

    protected $guarded = ['id_robot'];

    protected $primaryKey = 'id_robot';


    public function infos()
    {
        return $this->hasMany(Info::class, 'robot_id');
    }
}
