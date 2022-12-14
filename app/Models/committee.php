<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class committee extends Model
{
    use HasFactory;
    protected $table='committee';
    protected $primaryKey='committee_id';
    protected $fillable = [
        'committee_id', 
        'name', 
        'email', 
        'Major', 
        'role',
        'password',
    ];
}
