<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'company',
        'leader',
        'user_amount',
        'budget',
        'status',
        'start_date',
        'end_date'
    ]; 
    public function modules(){
        return $this->hasMany(Module::class);
    }
}
