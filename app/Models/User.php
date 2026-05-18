<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'total_points',
    ];

    protected $hidden = [
        'password',
    ];

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function addPoints($points)
    {
        $this->increment('total_points', $points);
    }

    public function getPoints()
    {
        return $this->total_points ?? 0;
    }
}
