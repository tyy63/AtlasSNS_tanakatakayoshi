@extends('layouts.login')

@section('content')


{{-- 自分のプロフィールを編集する --}}

<img src="{{asset('images/'.Auth::user()->images)}}" class="login-image">
<form method="POST" action="">
    @csrf
    <div>
        <label for="name">ユーザー名:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="password_confirmation">パスワード確認:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div>
        <label for="bio">自己紹介文:</label>
        <textarea id="bio" name="bio">{{ old('bio') }}</textarea>
    </div>
    <div>
        <label for="icon">アイコン画像:</label>
        <input type="file" id="icon" name="icon">
    </div>
    <button type="submit">更新</button>
</form>

@endsection
