@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container">
    <div class="form-register">
    <p class="font-a">新規ユーザー登録</p>
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}

    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}

    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}

    {!! Form::submit('新規登録', ['class' => 'btn btn-danger']) !!}


    <p class="font-c"><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
    </div>
</div>


@endsection
