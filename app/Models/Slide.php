<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'lrv12_slides';
    protected $guarded = [];
    
    public function pro()
    {
    	return $this->belongsTo('App\Models\Products');
    }
}
