<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    use HasFactory;
    protected $table='cv';
    protected $primaryKey='id';
    protected $fillable = [
        'id', 
        'skills', 
        'languages', 
        'experience', 
        'Interests',
        'certifactionFile',
        'acdamicFile',
        'identificationLetter',
    ];
}
