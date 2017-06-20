<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'lrv12_news';
    protected $guarded = [];
    public function user()
      {
      		return $this->belongsTo('App\Models\User','user_id');
      }
}
