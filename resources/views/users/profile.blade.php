@extends('layouts.login')

@section('content')


{{-- したい事　リンク先の アイコン 名前 自己紹介文　の下に投稿 日時順で表示 --}}
        <p><img src="{{asset('images/'.Auth::user()->images)}}"  class="login-image"></p>
        <p>ユーザー名{{$users->username}}</p>
        <p>自己紹介文{{$users->bio}}</p>


{{-- フォロー・解除ボタン --}}
                @if (auth()->user()->isFollowing($users->id))
                    <form method ="POST" action="{{route('detach',['user'=>$users->id])}}">@csrf
                      <button type="submit">フォロー解除</button>
                    </form>
                @else
                    <form method ="POST" action="{{route('attach',['user'=>$users->id])}}">@csrf
                      <button type="submit">フォローする</button>
                    </form>
                @endif


{{-- 投稿を表示 --}}
          @foreach ($posts as $post)
          <td>{{$post ->user ->username}}</td>
          <td>{{$post ->post}}</td>
          <td>{{$post ->created_at}}</td>
          @endforeach


@endsection
