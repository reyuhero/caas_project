<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    public $cast = [
        'links' => 'array',
        'members' => 'array',
        'photos' => 'array'
    ];

    public $fillable = [
        'title',
        'description',
        'links',
        'type',
        'members',
        'photos'
    ];

}
