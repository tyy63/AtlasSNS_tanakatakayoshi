<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
    $posts = Post::orderBy('created_at', 'desc')->get();
    $user = Auth::user();
    return view('posts.index', ['user' => $user, 'posts' => $posts]);
    }


    // 投稿作成
    public function postCreate(Request $request)
    {
    $validator = $request->validate([
    'post' => ['required', 'string', 'min:1', 'max:150'],
    ]);

    $user_id = Auth::id();
    // dd($user_id);
    $post = $request->input('post');

    Post::create([
    'user_id' => $user_id,
    'post' => $post,
    ]);
        return redirect('/top');
    }

    // 編集用
    public function postUpdate(Request $request)
    {
    $validator = $request->validate([
    'post' => ['required', 'string', 'max:150'],
    ]);

    $Post_update = $request->input('post');
    $id = $request->input('post_id');

    Post::where('id', $id)->update([
    'post' => $Post_update
    ]);
    return redirect('/top');
    }

    // 投稿削除用
    public function delete($id)
    {
    Post::where('id', $id)->delete();
    return redirect('/top');
    }


    public function show()
    {
  // Postモデル経由でpostsテーブルのレコードを取得
    $posts = Post::get();
    return view('followList.blade', compact('posts'));
    }


}
