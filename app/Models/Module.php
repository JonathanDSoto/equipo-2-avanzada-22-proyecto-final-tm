<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('user_id','percentage_advance', 'role');
    }
}
