<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenge';
    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'lenguage'
    ];

}
