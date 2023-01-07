<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Mappable;

class trainee extends Model
{
    use HasFactory;
   
    protected $table='users';
    protected $primaryKey='trainee_id';
    protected $fillable = [
        'trainee_id', 
        'name', 
        'email', 
        'Major', 
        'phone',
        'role',
        'is_request',
        'status',
        'password',
        'committee_id',
        'opportunity_id',
        'unit_id',
    ];
     public function oppourtunity()
    {
        return $this->belongsTo('App\Models\oppourtunity','opportunity_id');
    }
         public function Sendsdocument()
    {
        return $this->hasMany('App\Models\Sendsdocument','trainee_id');
    }
}
