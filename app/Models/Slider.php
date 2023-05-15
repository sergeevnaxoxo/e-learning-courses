<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'descrition',
        'maxpoints',
        'minpoints',
        'course_id',
        'task_id',
        'training_id',
    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function training(){
        return $this->belongsTo(Training::class);
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

}
