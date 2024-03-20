<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        public function follow($user_id)
        {
        return $this->follows()->attach($user_id);
        }



// フォロー解除機能
        public function unfollow($user_id)
        {
        return $this->follows()->detach($user_id);
        }


}
