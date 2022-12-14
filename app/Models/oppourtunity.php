<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oppourtunity extends Model
{
    use HasFactory;
    protected $table='opportunity';
    protected $primaryKey='id';
    protected $fillable = [
        'Start_at', 
        'end_at', 
        'jobTitle', 
        'workHours',
        'supervisorName',
        'supervisorPhone',
        'RoleDescription',
        'incentive', 
        'requirement', 
        'majors', 
        'numberOfTrainee', 
        'address',
        'AppDeadline',
        'PtPlan',
        'company_id'
    ];
         public function trainee()
    {
        return $this->hasMany('App\Models\trainee');
    }
}
