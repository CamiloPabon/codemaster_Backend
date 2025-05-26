<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'idROLES';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class, 'rol_idROLES');
    }
}
