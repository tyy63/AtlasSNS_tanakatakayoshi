<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Facades\Auth;
use App\User;

class Follow extends Model
{
protected $fileable=[
  'following_id','followed_id'
];

}
