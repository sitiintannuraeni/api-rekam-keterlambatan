<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayons extends Model
{
    protected $table = "rayons";

    protected $fillable = [
        'rayon',
        'user_id'
    ];
}
