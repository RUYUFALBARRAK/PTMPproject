<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;
    protected $table='announcements';
    protected $primaryKey='id';
    protected $fillable = [
        'title',
        'content'
    ];
}
