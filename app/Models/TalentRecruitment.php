<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentRecruitment extends Model
{
    use HasFactory;
    protected $casts = [
        'skills' => 'array',
        'categories' => 'array'
    ];
    protected $fillable = [
        'title',
        'description',
        'skills',
        'categories'
    ];
}
