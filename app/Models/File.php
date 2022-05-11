<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'mime',
        'name',
        'size',
        'location'
    ];
    public function teamsLogo()
    {
        return $this->hasMany(Team::class, 'logo_id');
    }
    public function teamsBanner()
    {
        return $this->hasMany(Team::class, 'banner_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'avatar_id');
    }
    public function profile()
    {
        return $this->hasMany(Profile::class, 'avatar_id');
    }
}
