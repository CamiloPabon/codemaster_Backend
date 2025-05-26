<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'RANKING';
    protected $primaryKey = 'idRANKING';
    public $timestamps = false;

    protected $fillable = ['CODIGO', 'LUGAR'];

    public function statistics()
    {
        return $this->hasMany(Statistic::class, 'idRANKING');
    }
}