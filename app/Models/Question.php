<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'points',
        'task_id',
        'type_id',
        'file',
    ];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function rightQuestions()
    {
        return $this->hasMany(RightQuestion::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
