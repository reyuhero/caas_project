<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOffering extends Model
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
        'members',
        'timeline',
        'pricing',
        'team_id',
        'photos',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_service_offering','service_offering_id','category_id');
    }
}
