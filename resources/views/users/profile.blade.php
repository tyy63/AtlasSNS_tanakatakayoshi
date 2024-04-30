@extends('layouts.login')

@section('content')


{{-- リンク先の アイコン 名前 自己紹介文　の下に投稿 日時順で表示 --}}


<div class="user-profile">
        <div class="top-other">
                <div>
                        <img src="{{asset('/storage/uploads/'.Auth::user()->images)}}" class="edit-image">
                </div>
                <div class="other-flex">
                        <div class="other-container">
                                <div>ユーザー名</div>
                                <div>{{$users->username}}</div>
                        </div>
                        <div class="other-container">
                                <div>自己紹介文</div>
                                <div>{{$users->bio}}</div>
                        </div>
                </div>
{{-- フォロー・解除ボタン --}}
                <div class="edit-button-profile">
                        @if (auth()->user()->isFollowing($users->id))
                                <form method ="POST" action="{{route('detach',['user'=>$users->id])}}">@csrf
                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                </form>
                        @else
                                <form method ="POST" action="{{route('attach',['user'=>$users->id])}}">@csrf
                                <button type="submit" class="btn btn-primary">フォローする</button>
                                </form>
                        @endif
                </div>
        </div>
</div>

{{-- 投稿を表示 --}}
        @foreach($posts as $post)
        <ul class="post-all">
        <li>
                <div>
                        <img src ="/storage/uploads/{{$post->user->images}}" class="login-image">
                </div>
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
