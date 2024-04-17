<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $guarded = ['id_info'];

    protected $primaryKey = 'id_info';

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
    public function robot()
    {
        return $this->belongsTo(Robot::class, 'robot_id');
    }

}
