<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iproducts extends Model
{
    protected $table = 'lrv12_iproducts';
    protected $guarded = [];
    public function products()
    {
    	return $this->belongsTo('App\Models\Products','products_id');
    }
    
}
