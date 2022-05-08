<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo_url',
        'url',
        'tagline',
        'description',
        'project_completed',
        'ownership',
        'payment_verified_members',
    ];
    public function skills()
    {
        return $this->belongsToMany(Team::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user', 'user_id','team_id');
    }
    public function ownership()
    {
        return $this->belongsTo(User::class, 'id', 'ownership');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function logoUrl()
    {
        return $this->hasOne(File::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
