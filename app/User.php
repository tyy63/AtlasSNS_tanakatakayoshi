<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Follow;

// リレーションをする

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
        'username', 'mail', 'password',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =
        [
        'password', 'remember_token',
        ];

        public function posts()
        {
        return $this->hasMany('App\Post');
        }

        public function following()
        {
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
        }

        public function followed()
        {
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
        }


// フォロー機能
        public function follow(Int $user_id)
        {
        return $this->followed()->attach($user_id);
        }


// フォロー解除機能
        public function unfollow(Int $user_id)
        {
        return $this->followed()->detach($user_id);
        }


// フォローしているかの判断
        public function isFollowing(Int $user_id)
        {
        return $this->followed()->where('followed_id',$user_id)->exists();
        }




}
