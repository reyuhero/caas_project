<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar_id',
        'description',
        'location',
    ];

    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
