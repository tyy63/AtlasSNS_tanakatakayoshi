
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <!--IEブラウザ対策-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="ページの内容を表す文章" />
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
        <!--スマホ,タブレット対応-->
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <!--サイトのアイコン指定-->
        <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
        <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
        <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
        <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
        <!--iphoneのアプリアイコン指定-->
        <link rel="apple-touch-icon-precomposed" href="画像のURL" />
        <!--OGPタグ/twitterカード-->
    </head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <header class="hed">
            {{-- ロゴからトップページへのリンクを記載 --}}
        <h1><a href="/top"><img src="{{asset('images/atlas.png')}}" class="logo-image"></a></h1>
        <div class="icon">
            <p class="name">{{ Auth::user()->username }}&nbsp;&nbsp;さん</p>
            <button type="button" class="menu-btn">
            <span class="inn"></span>
            </button>
            <nav class="menu">
                <ul>
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/edit">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
            <img src="{{asset('images/'.Auth::user()->images)}}" class="login-image">
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                    <p class="side ms-3">{{ Auth::user()->username }}さんの</p></a>
                    <p class="side ms-3">フォロー数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->followed()->get()->count() }}人</p>
                    <p class="side text-end"><a href="/followList" class="btn btn-primary w-50">フォローリスト</a></p>
                    <p class="side ms-3">フォロワー数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->following()->get()->count() }}人</p>
                    <p class="side text-end"><a href="followerList" class="btn btn-primary w-50">フォロワーリスト</a></p>
            </div>
            <p class="side text-center mt-3"><a href="search" class="btn btn-primary px-3 w-50">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="/js/script.js"></script>
</body>
</html>
