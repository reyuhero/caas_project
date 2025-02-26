<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $casts = [
        'links' => 'array',
        'photos' => 'array'
    ];

    protected $fillable = [
        'title',
        'description',
        'links',
        'type',
        'team_id',
        'photos',
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
