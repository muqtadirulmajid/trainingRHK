<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Training extends Model
{
    protected $table = 'training';
    protected $appends = ['Descriptionlimited'];
    protected $fillable = ['title', 'slug', 'year', 'month', 'image', 'start', 'end', 'description', 'description2', 'subtitle'];

    public static function boot() {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->title);
            $model->year = date('Y');
            $model->month = date('m');
        });
    }

    public function scopeFindTraining($query, $slug, $month, $year) {
        return $query->where('slug', $slug)
                    ->where('month', $month)
                    ->where('year', $year)->firstOrFail();
    }

    public function getDescriptionlimitedAttribute() {
    	return strip_tags(Str::words($this->description, '100'));
    }

    public function gallery() {
        return $this->hasMany('App\Models\Gallery');
    }
    
    public function partner() {
        return $this->hasMany('App\Models\Partner');
    }

    public function faq() {
        return $this->hasOne('App\Models\Faq');
    }
}
