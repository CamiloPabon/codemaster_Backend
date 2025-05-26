<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadistics extends Model
{
    protected $table = 'statistic';
    protected $primaryKey = 'idstatistic';
    public $timestamps = false;

    protected $fillable = [
        'TIEMPO',
        'CODIGO',
        'LINEAS_CODIGO',
        'COMPILACIONES',
        'idRANKING',
        'challenge_id'
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

    public function ranking()
    {
        return $this->belongsTo(Ranking::class, 'idRANKING');
    }
}
