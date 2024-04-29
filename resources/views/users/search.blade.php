@extends('layouts.login')

@section('content')


<div class="search-form">
    <div class="search-enter d-flex align-items-center">
        <form action="/search" method="post" class="search-box d-flex">
            @csrf
            <div><input type="text" name="keyword" class="form-white-background" placeholder="ユーザー名"></div>
            <div><button class="default-button"> <img src="/images/search.png" class="search-button-image" alt="検索"></button></div>
        </form>
        <!-- 検索ワードの表示 -->
        <div>
            @if(!empty($keyword))
                <p class="word">検索ワード：{{$keyword}}</p>
            @endif
        </div>
    </div>
</div>


{{-- アイコンとユーザー名を表示する --}}
          @foreach($users as $user)
              @if ($user->id !== Auth::user()->id)
              <div class="search-all">
                      <img src ="{{asset('/storage/uploads/'.Auth::user()->images)}}" class="search-icon ">

                      <div class="search-content">
                        <p>{{$user ->username}}</p>
{{-- フォローボタンと解除ボタンの設置 --}}
                        @if (auth()->user()->isFollowing($user->id))
                            <form method ="POST" action="{{route('detach',['user'=>$user->id])}}">@csrf
                            <button type="submit" class="btn btn-danger">フォロー解除</button>

                            </form>
                        @else
                            <form method ="POST" action="{{route('attach',['user'=>$user->id])}}">@csrf
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </form>
                        @endif
                      </div>
              </div>
              @endif
          @endforeach



@endsection
