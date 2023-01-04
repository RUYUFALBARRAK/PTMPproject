<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;
    protected $table='document';
    protected $primaryKey='id';
    protected $fillable = [
        'document',
        'documentName',
        'uploaded_for'
    ];
}
