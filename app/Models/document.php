<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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


    public function documentPath() {
        return 'docs/'.$this->document;
    }

    public function getDocumentURL() {
        return url($this->documentPath());
    }


}
