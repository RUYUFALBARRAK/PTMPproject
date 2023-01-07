<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\fileNameEnum;
class Sendsdocument extends Model
{
    use HasFactory;
    protected $table='sendsdocuments';
    protected $casts = [
    'doc_name' => fileNameEnum::class,
];
    protected $fillable = [
        'document',
        'opportunity_id',
        'trainee_id',
        'committee_id',
    ];
     public function trainee()
    {
        return $this->belongsTo('App\Models\trainee','trainee_id');
    }

}
