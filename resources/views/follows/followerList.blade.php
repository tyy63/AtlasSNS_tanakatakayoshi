@extends('layouts.login')

@section('content')

{{-- アイコンを一覧で表示する --}}
        @foreach($followUsers as $followUser)
        <tr>
        <td><a class="" href="profile/{{$followUser->id}}/otherProfile"><img src ="images/{{$followUser->images}}" class="login-image"></a></td>
        </tr>
        @endforeach


{{-- 投稿を表示 --}}
        @foreach($posts as $post)
        <tr>
        <td><img src ="images/{{$post->user->images}}" class="login-image"></td>
        <td>{{$post->user->username}}</td>
        <td>{{$post->post}}</td>
        <td>{{$post->created_at}}</td>
        </tr>
        @endforeach


@endsection
