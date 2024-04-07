@extends('layouts.login')

@section('content')


{{-- 自分のプロフィールを編集する --}}


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <img src="{{asset('/storage'.Auth::user()->images)}}" class="login-image">

    <form method="POST" action="{{ route('imageUpdate') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">ユーザー名:</label>
        <input type="text" name="name_update" value="{{ Auth::user()->username }}">
    </div>
    <div>
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="mail_update" value="{{ Auth::user()->mail }}">
    </div>
    <div>
        <label for="password">パスワード:</label>
        <input type="password" id="password_update" name="password">
    </div>
    <div>
        <label for="password_confirmation">パスワード確認:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div>
        <label for="bio">自己紹介文:</label>
        <textarea id="bio" name="bio_update">{{ Auth::user()->bio }}</textarea>
    </div>
    <div>

        {{-- ここの画像　保存　アップロードをしていく。 --}}

        <label for="icon">アイコン画像:</label>
        <input type="file" id="icon" name="icon">
    </div>
    <button type="submit">更新</button>
</form>

@endsection
