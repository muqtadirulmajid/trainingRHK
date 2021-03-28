<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['training_id', 'status', 'image'];

    public function training() {
        return $this->belongsTo('App\Models\Training');
    }
}
