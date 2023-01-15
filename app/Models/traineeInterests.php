<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traineeInterests extends Model
{
    use HasFactory;
    protected $table='traineeinterests';
    protected $primaryKey='id';
    protected $fillable = [
        'id', 
        'Interests',
 
    ];
}
