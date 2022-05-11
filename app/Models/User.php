<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // ! type client = 0
    // ! type freelancer = 1
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'avatar_id',
        'email',
        'password',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function type(): Attribute{
        return new Attribute(
            get: fn($value) => [ 'client', 'freelancer'][$value],
        );
    }
    public function isClient() {
        return $this->type === 1;
    }
    public function isFreelancer() {
        return $this->type === 0;
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_user', 'user_id','team_id');
    }
    public function team()
    {
        return $this->hasOne(Team::class, 'ownership_id');
    }
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
