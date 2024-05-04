@extends('layouts.logout')

@section('content')

<div class="container">
  <div class="form">
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/login']) !!}
    <p class="font-a">AtlasSNSへようこそ</p>
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
    <div class="d-flex justify-content-end mr-5">
        {!! Form::submit('ログイン', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
      <p class="font-b"><a href="/register">新規ユーザーの方はこちら</a></p>

  </div>
</div>
@endsection
