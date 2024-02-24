<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 代入を防ぐ
class Post extends Model
{
      protected $fillable = ['post','user_id'];


      public function user(){
      return $this->belongsTo('App\User');
      }
}
