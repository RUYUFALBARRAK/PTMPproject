<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainee extends Model
{
    use HasFactory;
    protected $table='users';
    protected $primaryKey='trainee_id';
    protected $fillable = [
        'trainee_id', 
        'name', 
        'email', 
        'Major', 
        'phone',
        'is_request',
        'status',
        'password'
    ];
}
