<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sendsdocument extends Model
{
    use HasFactory;
    protected $table='sendsdocuments';
    protected $fillable = [
        'doc_name'
    ];
       public function oppourtunity()
    {
        return $this->hasOne('App\Models\oppourtunity');
    }
       public function trainee()
    {
        return $this->hasOne('App\Models\trainee');
    }
       public function committee()
    {
        return $this->hasOne('App\Models\committee');
    }
       public function document()
    {
        return $this->hasOne('App\Models\document');
    }
}
