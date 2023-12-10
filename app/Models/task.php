<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'assignment_title',
        'assignment',
        'description',
        'answer',
        'category_id'
    ];
}
