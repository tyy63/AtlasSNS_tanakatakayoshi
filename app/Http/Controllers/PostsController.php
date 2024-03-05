<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        $user= Auth::user();
        return view('posts.index',['user'=>$user,'posts'=>$posts]);
    }

    public function postCreate(Request $request)
    {
        $validator = $request->validate(['post' => ['required', 'string','min:1', 'max:150'],
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

    // 編集用
        public function postUpdate(Request $request)
    {
        dd($request);
        // $validator = Validator::make($data, [
        //     'text' => ['required', 'string', 'max:150']
        // ]);

        // $Post_update = $request->input('post',)
        // $id = $request->input('id',)

        // Post::where('id',$id)->update([
        //     'post' => $post_update
        // ]);

        return redirect('/top');
    }



// 投稿削除用
        public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
}
