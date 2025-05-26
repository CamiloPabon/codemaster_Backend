<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassroomHasUser extends Pivot
{
    protected $table = 'classroom_has_user';
    public $timestamps = false;

    protected $fillable = [
        'classroom_idCLASSROOMS',
        'users_id',
        'users_rol_idROLES'
    ];
}

