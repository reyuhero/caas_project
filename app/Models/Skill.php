<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $with = ['category'];
    use HasFactory;
    protected $fillable =[ 'name' , 'category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
