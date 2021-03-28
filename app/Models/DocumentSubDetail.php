<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentSubDetail extends Model
{
    protected $table = 'sub_document_detail';
    protected $fillable = ['document_detail_id', 'name', 'file'];
    
    public function document_detail() {
        return $this->belongsTo('App\Models\DocumentDetail');
    }
}
