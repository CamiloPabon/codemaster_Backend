<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenge';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'lenguage'
    ];

    public function classroom()
    {
        return $this->hasMany(Classroom::class, 'challenge_id');
    }

    public function statistics()
    {
        return $this->hasMany(Statistic::class, 'challenge_id');
    }
}
