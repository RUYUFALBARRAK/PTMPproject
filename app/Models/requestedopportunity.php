<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestedopportunity extends Model
{
    use HasFactory;
    protected $table='requestedopportunity';
    protected $fillable = [
'oppourtunity_id',
    ];
       public function oppourtunity()
    {
        return $this->belongsTo('App\Models\oppourtunity','oppourtunity_id');
    }
       public function trainee()
    {
        return $this->hasOne('App\Models\trainee');
    }
       public function committee()
    {
        return $this->hasOne('App\Models\committee');
    }

}
