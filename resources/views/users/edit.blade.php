@extends('layouts.login')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- 自分のプロフィールを編集する --}}
    <div class="my-profile">
        <div class="profile-container">
            <div><img src="{{asset('/storage/uploads/'.Auth::user()->images)}}" class="edit-image"></div>
            <form method="POST" action="{{ route('imageUpdate') }}" enctype="multipart/form-data">
            @csrf
            <div class="edit-profile">
                <div><label for="name">ユーザー名</label></div>
                <div><input type="text" name="name_update" value="{{ Auth::user()->username }}"></div>
            </div>
            <div class="edit-profile">
                <div><label for="email">メールアドレス</label></div>
                <div><input type="email" id="email" name="mail_update" value="{{ Auth::user()->mail }}"></div>
            </div>
            <div class="edit-profile">
                <div><label for="password">パスワード</label></div>
                <div><input type="password" id="password_update" name="password"></div>
            </div>
            <div class="edit-profile">
                <div><label for="password_confirmation" >パスワード確認</label></div>
                <div><input type="password" id="password_confirmation" name="password_confirmation"></div>
            </div>
            <div class="edit-profile">
                <div><label for="bio">自己紹介文</label></div>
                <div><textarea id="bio" name="bio_update"  class="fixed-width">{{ Auth::user()->bio }}</textarea></div>
            </div>
            <div class="edit-profile">
                {{-- ここの画像　保存　アップロードをしていく。 --}}
                <div><label for="icon">アイコン画像</label></div>
                <div><input type="file" id="icon" name="icon" class="fixed-box"></div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="edit-submit btn btn-danger padding-left-right">更新</button>
        </div>

    </div>

    </form>


@endsection
