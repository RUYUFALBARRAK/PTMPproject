<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oppourtunity extends Model
{
    use HasFactory;
    protected $table = 'opportunity';
    protected $primaryKey = 'id';
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
        'company_id',
        'status',
        'note',
    ];

    public function trainee()
    {
        return $this->hasMany('App\Models\trainee', "opportunity_id");
    }

    public function company()
    {
        return $this->belongsTo('App\Models\company');
    }

    public function requestedopportunity()
    {
        return $this->hasMany(requestedopportunity::class,'opportunity_id');
    }


    /* public function PtPlanPath() {
return 'download/'.$this->PtPlan;
}

public function getPlanURL() {
return url($this->PtPlanPath());
}*/
}
