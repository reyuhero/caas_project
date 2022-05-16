<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo_id',
        'banner_id',
        'profile_id',
        'badge_id',
        'url',
        'tagline',
        'description',
        'project_completed',
        'ownership_id',
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
        return $this->belongsTo(User::class, 'ownership_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function logo()
    {
        return $this->belongsTo(File::class, 'logo_id');
    }
    public function logoUrl()
    {
        return Storage::disk('images')->url($this->logo->location);
    }
    public function banner()
    {
        return $this->belongsTo(File::class, 'banner_id');
    }
    public function bannerUrl()
    {
        return Storage::disk('images')->url($this->banner->location);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }

}
