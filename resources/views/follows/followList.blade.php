@extends('layouts.login')

@section('content')

{{-- アイコンを一覧で表示する --}}

<div class="user-profile">
        <p class="icon-title">フォローリスト</p>
        <div class="follow">
        @foreach($followUsers as $followUser)
        <a class="" href="profile/{{$followUser->id}}/otherProfile"><img src ="/storage/uploads/{{$followUser->images}}" class="login-image"></a>
        @endforeach
        </div>
</div>

{{-- 投稿を表示 --}}
        @foreach($posts as $post)
        <ul class="post-all">
        <li>
        <div><img src ="/storage/uploads/{{$post->user->images}}" class="login-image"></div>
        <div class="post-content">
        <div>
        <div class="post-name">{{$post->user->username}}</div>
        <div>{{$post->created_at}}</div>
        </div>
        <div>{{$post->post}}</div>
        </div>
        </li>
        </ul>
        @endforeach

@endsection
