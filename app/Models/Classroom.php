<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrom';
    protected $primaryKey = 'idCLASSROOMS';
    public $timestamps = true;

    protected $fillable = ['RETOS', 'CLASSROOMSol', 'challenge_id'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

}
