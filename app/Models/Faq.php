<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = ['training_id', 'faq'];

    public function training() {
        return $this->belongsTo('App\Models\Training');
    }
}
