<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traineeSkills extends Model
{
    use HasFactory;
    protected $table='traineeskills';
    protected $primaryKey='id';
    protected $fillable = [
        'id', 
        'skills'];
}
