
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <!--IEブラウザ対策-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="ページの内容を表す文章" />
        <title></title>
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
    <header>
        <div id = "head">
            {{-- ロゴからトップページへのリンクを記載 --}}
        <h1><a href="/top"><img src="images/atlas.png"class="logo-image"></a></h1>
            <div id="">
                <div id="">
                    <p class="icon">{{ Auth::user()->username }}さん<img src="{{asset('images/'.Auth::user()->images)}}" class="login-image"></p>
                </div>
        {{-- アコーディオンメニューを作成 --}}
                <button type="button" class="menu-btn">
                    <span class="inn"></span>
                </button>
                <nav class="menu">
                    <ul>
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <a href="/profile"><p>{{ Auth::user()->username }}さんの</p></a>
                <div>
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->followed()->get()->count() }}名</p>
                    </div>
                    <p class="btn"><a href="/followList">フォローリスト</a></p>
                    <div>
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->following()->get()->count() }}名</p>
                    </div>
                <p class="btn"><a href="followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="/js/script.js"></script>
</body>
</html>
