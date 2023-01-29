<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\fileNameEnum;
use App\Models\trainee;
use Illuminate\Support\Facades\Storage;
class cv extends Model
{
    use HasFactory;
    protected $table='cv';
    protected $primaryKey='id';
        protected $casts = [
    'documentName' => fileNameEnum::class,
];
    protected $fillable = [
        'id', 
        'documentName',
        'document',
        'trainee_id'
    ];
     public function trainee()
    {
        return $this->belongsTo('App\Models\trainee','trainee_id');
    }
        public function documentPath() {
        return 'docs/'.$this->document;
    }

    public function getDocumentURL() {
        return url($this->documentPath());
    }
}
