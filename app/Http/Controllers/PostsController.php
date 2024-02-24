<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    //
    // 下記に投稿フォームを設置していく
    public function index()
    {
        return view('posts.index');
    }
    public function postCreate(Request $request)
    {
        $validator = $request->validate(['post' => ['required', 'string','min:1', 'max:280'],
        ]);

        $user_id = Auth::id();
        // dd($user_id);
        $post = $request->input('post');

        Post::create([
            'user_id' => $user_id,
            'post'=>$post,
        ]);
        return redirect('/top');
    }
}
