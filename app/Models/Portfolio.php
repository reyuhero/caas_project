<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $casts = [
        'links' => 'array',
        'members' => 'array',
        'photos' => 'array'
    ];

    protected $fillable = [
        'title',
        'description',
        'links',
        'type',
        'members',
        'photos'
    ];

}
