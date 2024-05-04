<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;


class UsersController extends Controller
{
//相手プロフィールへ画面へ移る　特定のIDを引っ張ってくる（＄id）で
    public function profile($id)
    {
    $users = user::where('id', $id)->first();
    $posts = Post::with(['user'])->where('user_id', $id)->orderBy('created_at', 'desc')->get();
    return view('users.profile',['posts' => $posts],['users' => $users]);
    }

    public function search()
    {
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

// プロフィール編集
    public function edit()
    {
    return view('users.edit');
    }



// プロフィールの編集とバリデーションをかける
    public function profileUpdate(Request $request)
    {
// dd($request);
    $validated = $request->validate([
    'name_update' => ['required','min:2','max:12'],
    'mail_update' => ['sometimes', 'required', 'min:5', 'max:40', 'email', 'unique:users,mail,' . $request->user()->id],
    'password' => ['min:8','max:20','alpha_num','confirmed'],
    'bio_update'=>['max:150'],
    'icon'=>'image|mimes:jpeg,png,bmp,gif,svg',
    ]);

    $name_update = $request->input('name_update');
    $mail_update = $request->input('mail_update');
    $password_update = $request->input('password');
    $bio_update = $request->input('bio_update');
    $images_update = $request->file('icon');
// dd($name_update);


    $images_update_Path = $request->file('icon')->store('public/uploads/');


// パス名の指定
    $id = Auth::id();
    User::where('id', $id)->update
    ([
    'username' => $name_update,
    'mail' => $mail_update,
    'password' => bcrypt($password_update),
    'bio' => $bio_update,

    'images' => basename($images_update_Path),

    ]);
    return redirect('/top');
    }

}
