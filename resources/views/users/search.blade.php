@extends('layouts.login')

@section('content')


          <form action="/search" method="post">
            @csrf
            <input type="text" name="keyword" class="form" placeholder="ユーザー名">
            <button> <img src="/images/search.png" class="button-image" alt="検索"></button>
          </form>


          {{-- 検索ワードの表示 --}}
          @if(!empty($keyword))
            <p>検索ワード：{{$keyword}}</p>
          @endif


          {{-- アイコンとユーザー名を表示する --}}
        <table>
          @foreach($users as $user)
            @if ($user->id !== Auth::user()->id)
              <tr>
                    <td><img src ="{{asset('images/'.Auth::user()->images)}}" class="login-image"></td>
                    <td>{{$user ->username}}</td>

          {{-- フォローボタンと解除ボタンの設置 --}}
                @if (auth()->user()->isFollowing($user->id))
                    <form method ="POST" action="{{route('detach',['user'=>$user->id])}}">@csrf
                      <td><button type="submit">フォロー解除</button></td>
                    </form>
                @else
                    <form method ="POST" action="{{route('attach',['user'=>$user->id])}}">@csrf
                      <td><button type="submit">フォローする</button></td>
                    </form>
                @endif
            </tr>
          @endif
          @endforeach
        </table>
@endsection
