<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StatisticHasRanking extends Pivot
{
    protected $table = 'statistic_has_RANKING';
    public $timestamps = false;

    protected $fillable = [
        'statistic_idstatistic',
        'statistic_challenge_id',
        'RANKING_idRANKING'
    ];
}

