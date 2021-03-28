<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $fillable = ['training_id', 'name'];

    public function training() {
        return $this->belongsTo('App\Models\Training');
    }

    public function detail() {
        return $this->hasMany('App\Models\DocumentDetail');
    }
}
