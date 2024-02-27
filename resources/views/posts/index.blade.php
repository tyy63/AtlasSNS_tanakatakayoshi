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
                    <img src="{{asset('images/'.Auth::user()->images)}}">
                @endif
            </div>
            <div style="flex: 1; margin-left: 10px;">
                <!-- ここにフォームを追加 -->
                    <div class="container">
                        {!! Form::open(['url' => '/post']) !!}
                        <div class="form-group">
                        {{ Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
                        </div>
                        {{ csrf_field() }}
                        <button class="btn btn-success"> <img src="/images/post.png" alt="送信"></button>
                        {!! Form::close() !!}
                    </div>
            </div>
        @foreach($posts as $post)
            <tr>
                <td><img src="{{asset('images/'.Auth::user()->images)}}"></td>
                <td>{{$post ->user_id}}</td>
                <td>{{$post ->post}}</td>
                <td>{{$post ->created_at}}</td>
                <td><a class="btn btn-primary" href=""><img src="/images/edit.png" alt="編集"></a></td>
                <td><a class="btn btn-primary" href=""><img src="/images/trash.png" alt="削除"></a></td>
            </tr>
        @endforeach
    </div>
</body>
</html>

@endsection
