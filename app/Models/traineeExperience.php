<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traineeExperience extends Model
{
    use HasFactory;
     protected $table='traineeexperience';
    protected $primaryKey='id';
    protected $fillable = [
        'id', 
        'Experience', 
    ];
}
