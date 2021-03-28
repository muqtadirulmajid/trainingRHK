<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentDetail extends Model
{
    protected $table = 'document_detail';
    protected $fillable = ['document_id', 'type'];

    public function document() {
        return $this->belongsTo('App\Models\Document');
    }

    public function subdetail() {
        return $this->hasMany('App\Models\DocumentSubDetail');
    }
}
