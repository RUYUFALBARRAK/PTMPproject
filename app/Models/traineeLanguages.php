<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traineeLanguages extends Model
{
    use HasFactory;
    protected $table='traineelanguage';
    protected $primaryKey='id';
    protected $fillable = [
        'id', 
        'Languages', 

    ];
}
