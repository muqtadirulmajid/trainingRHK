<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawDetail extends Model
{
    protected $table = 'raw_detail';
    protected $fillable = ['code', 'name', 'type'];
}
