<?php

namespace App\Models;

use App\Models\User;
use App\Models\File;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'duration',
        'start_date',
        'method',
        'total_budget',
        'monthly_budget',
        'budget_duration',
        'team_size',
        'scope',
        'user_id',
        'team_id',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
    public function categories() {
        return $this->belongsToMany(Category::class);
    }
    public function team() {
        return $this->hasOne(Team::class);
    }
    public function skills(){
        return $this->belongsToMany(Skill::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }

}
