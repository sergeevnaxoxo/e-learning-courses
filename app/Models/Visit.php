<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'points',
        'user_id',
        'slider_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function slider(){
        return $this->belongsTo(Slider::class);
    }
}
