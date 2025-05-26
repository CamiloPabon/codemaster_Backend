<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    protected $primaryKey = 'idCLASSROOMS';
    public $timestamps = false;

    protected $fillable = ['RETOS', 'CLASSROOMSol', 'challenge_id'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'classroom_has_user', 'classroom_idCLASSROOMS', 'users_id')
                    ->withPivot('users_rol_idROLES');
    }
}
