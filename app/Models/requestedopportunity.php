<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestedopportunity extends Model
{
    use HasFactory;
    protected $table='requestedopportunity';
            protected $casts = [
    'statusbytrainee' => companyStatus::class,
    'statusbycommittee' => companyStatus::class,
    'statusbycompany' => companyStatus::class,

];

    protected $fillable = [
        //'oppourtunity_id',
        'statusbytrainee',
        'statusbycommittee',
        'statusbycompany',
        'trainee_id',
        'opportunity_id',
        'company_id',
    ];
       public function oppourtunity()
    {
        return $this->belongsTo('App\Models\oppourtunity','oppourtunity_id');
    }
       public function trainee()
    {
        return $this->belongsTo('App\Models\trainee','trainee_id');
    }
       public function committee()
    {
        return $this->hasOne('App\Models\committee');
    }

}
