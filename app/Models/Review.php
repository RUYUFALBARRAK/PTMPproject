<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = '_review';
    protected $fillable = [
        'Create_at',
        'review',	
        'star_rating',
        'trainee_id',
        'company_id	',
    ];
}
