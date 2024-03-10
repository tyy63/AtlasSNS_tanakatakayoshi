@extends('layouts.login')

@section('content')
{{-- ここに記載していく。投稿フォームと　アイコンを --}}
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- フォームエリア -->
    <div style="display: flex; align-items: center;">
            <div>
                @if(Auth::check())
                    <!-- ログイン中のユーザーの画像を表示 -->
                    <img src="{{asset('images/'.Auth::user()->images)}}" class="login-image">
                @endif
            </div>
            <div>
                <!-- ここに新規作成投稿フォームを追加 -->
                    <div class="container">
                        {!! Form::open(['url' => '/post']) !!}
                        <div class="form-group">
                        {{ Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
                        </div>
                        {{ csrf_field() }}
                        <button> <img src="/images/post.png" class="button-image" alt="送信"></button>
                        {!! Form::close() !!}
                    </div>
            </div>


        @foreach($posts as $post)
            <tr>
                {{-- 投稿一覧表示に対して  --}}
                    <td><img src="{{asset('images/'.Auth::user()->images)}}"  class="login-image"></td>
                    <td>{{$post ->user_id}}</td>
                    <td>{{$post ->post}}</td>
                    <td>{{$post ->created_at}}</td>


                    {{-- ログインユーザーのみ編集・削除ボタンが付くようにする --}}
                @if (Auth()->user()->id == $post->user_id);
                    <td>
                                <button class="modal-open" data-post="{{ $post->post }}"
                            data-id="{{ $post->id }}"><img src="/images/edit.png" class="button-image"alt="編集"></button>
                            </td>

                    {{-- 削除ボタン --}}
                    <td><a class="" href="post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="/images/trash.png" class="delete-image" alt="削除"></a></td>
                @endif


                    {{-- モーダルの部分 --}}
                    <div class="modal-container">
                        <div class="modal-body">
                            <div class="modal-content">
                                {!! Form::open(['url' => '/post']) !!}
                                {{ Form::hidden('post', $post->id) }}
                                {{ Form::text('text', '', ['required', 'class' => 'form-control modal-input-post']) }}
                                <button type="submit"><img src="/images/edit.png" class="button-image"
                                alt="更新"></button>
                                @csrf
                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
            </tr>
        @endforeach
    </div>
</body>
</html>

@endsection
