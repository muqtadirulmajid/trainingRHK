<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $fillable = ['training_id', 'name', 'description', 'image'];

    public function training() {
        return $this->belongsTo('App\Models\Training');
    }
}
