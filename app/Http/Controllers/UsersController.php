<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = user::get();
        return view('users.search',['users' => $users]);
    }


    // 検索用
    public function userSearch(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $users = user::where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = user::all();
        }
        return view('users.search', ['users' => $users,'keyword'=>$keyword]);
    }



// フォロー機能
    public function follow(User $user)
    {
        Auth::user()->follow($user->id);
        return back();
    }

// フォロー解除機能

    public function unfollow(User $user)
    {
        Auth::user()->unfollow($user->id);
        return back();
    }


}
