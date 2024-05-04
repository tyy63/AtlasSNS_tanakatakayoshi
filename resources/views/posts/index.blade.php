@extends('layouts.login')

@section('content')


<!-- 新規投稿スペース -->
    <div class="new-post">
            <div class="post-create">
                @if(Auth::check())
                <img src="{{asset('/storage/uploads/'.Auth::user()->images)}}"class="create-image">
                @endif
                <!-- ここに新規作成投稿フォームを追加 -->
                <div>
                    {!! Form::open(['url' => '/post' ]) !!}
                    {{ Form::input('text', 'post', null, ['required', 'class' => 'no-border', 'placeholder' => '投稿内容を入力してください']) }}
                    {{ csrf_field() }}
                </div>
                    <div class="button-a"><button class="default-button"><img src="/images/post.png" class="button-submit" alt="送信"></button></div>
                    {!! Form::close() !!}
            </div>
    </div>
{{-- 投稿一覧スペース  --}}
        @foreach($posts as $post)
            <ul  class="post-all">
                <li>
                <div><img src ="/storage/uploads/{{$post->user->images}}" class="login-image"></div>
                <div class="post-content">
                            <div>
                                <div class="post-name">{{$post ->user->username}}</div>
                                {{$post ->created_at}}
                            </div>
                            <div>{{$post ->post}}</div>
                        {{-- ログインユーザーのみ編集・削除ボタンが付くようにする --}}
                    @if (Auth()->user()->id == $post->user_id)
                    <div>
                        <div class="button-set">
                            <button class="modal-open" data-post="{{ $post->post }}"data-id="{{ $post->id }}"><img src="/images/edit.png" class="button-image"alt="編集"></button>
                            {{-- 削除ボタン --}}
                            <a class="delete-image" href="post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"></a>
                        </div>
                    </div>
                    @endif
                </div>
                        {{-- 投稿編集　モーダル --}}
                        <div class="modal-container" data-id="{{ $post->id }}">
                            <div class="modal-body">
                                <div class="modal-content">
                                    <form action="{{ url('/post/' . $post->id . '/postUpdate') }}" method="POST">
                                    @csrf
                                    <input class="modal-input-id" type="hidden" name="post_id" value="">
                                    <input class="modal-input-post" type="textarea" name="post" value="">
                                    <br>
                                    <button type="submit" class="submit">
                                    <img src="/images/edit.png" class="modal-button-image" alt="更新">
                                    </button>
                                    {!! Form::close() !!}
                                    </form>
                                </div>
                            </div>
                        </div>
                </li>
            </ul>
        @endforeach

@endsection
