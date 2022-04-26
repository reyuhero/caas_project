<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon'
    ];

    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
