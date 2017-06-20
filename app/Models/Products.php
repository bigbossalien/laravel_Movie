<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
      protected $table = 'lrv12_products';
      protected $guarded = [];

      public function cate()
      {
      		return $this->belongsTo('App\Models\Cate','cat_id');
      }
      public function iproducts()
      {
      		return $this->hasMany('App\Models\Iproducts','products_id');
      }
      public function slide()
      {
                  return $this->hasOne('App\Models\Slide');
      }
}