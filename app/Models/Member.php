<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'user_id',
        'team_id'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
    public function createdAt()
    {
        return $this->created_at->format('M d Y');
    }
}
