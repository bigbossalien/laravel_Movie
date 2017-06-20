<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
      protected $table = 'lrv12_categorys';
      protected $guarded = [];

      public function products()
      {
      		return $this->hasMany('App\Models\Products');
      }
}
