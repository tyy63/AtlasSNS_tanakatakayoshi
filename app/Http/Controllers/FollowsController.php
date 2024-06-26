<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\User;
use App\Post;





class FollowsController extends Controller
{
    //フォローリストページ
    public function followList()
    {
    $users = Auth::user()->followed()->pluck('followed_id');
    $followUsers = User::whereIn('id', $users)->get();

    $posts = Post::with(['user'])
    ->whereIn('user_id', $users)
    ->orderBy('created_at', 'desc')
    ->get();

    return view('follows.followList',compact('followUsers','posts'));
    }




    // フォローワーリストページ
    public function followerList(){
    $users = Auth::user()->following()->pluck('following_id');
    $followUsers = User::whereIn('id', $users)->get();

    $posts = Post::with(['user'])
    ->whereIn('user_id', $users)
    ->orderBy('created_at', 'desc')
    ->get();

    return view('follows.followerList',compact('followUsers','posts'));
    }




}
