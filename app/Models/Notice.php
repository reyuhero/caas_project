<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'type',
        'member_id',
        'team_id'
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
