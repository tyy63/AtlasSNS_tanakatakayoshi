@extends('layouts.logout')

@section('content')

<div class="container">
  <div class="form-added">
    <div class="complete-a">
      <p>{{session('username')}}さん</p>
      <p>ようこそ！AtlasSNSへ！</p>
    </div>

    <div class="complete-b">
      <p>ユーザー登録が完了いたしました。</p>
      <p>早速ログインをしてみましょう!</p>
    </div>
    <a href="/login" class="btn btn-danger">ログイン画面へ</a>
  </div>


@endsection
