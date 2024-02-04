<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lates extends Model
{
    use HasFactory;
    protected $table = 'lates';

    protected $fillable = [
        'date_time_lates',
        'information',
        'proof',
        'student_id' 
    ];
}
