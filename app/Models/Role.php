<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    // user 1:*
    public function user()
    {
        return $this->hasMany(User::class);
    }
    // team 1:1 , role 1:*
    public function team()
    {
        return $this->hasMany(Team::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
