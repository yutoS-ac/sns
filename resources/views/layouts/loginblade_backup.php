<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
        <p class="headimage">
            <a href="/top"><img src="{{ asset('images/atlas.png') }}" alt=""></a>
        </p>
        <div class="menu-right">
            <ul class="menu">
                <li class="menu__single">
                    <a href="#" class="init-bottom"><p>{{Auth::user()->username}}さん</p></a>
                        <ul class="menu__second-level">
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                </li>
            </ul>
            <div class="head-profile-image">
                <img class="profile-edit-image" src="{{ asset('storage/images/' .auth()->user()->images) }}">
            </div>     
        </div> 
    </div>
</header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <div class="side">
                    <div class="side-name">
                        <p>{{Auth::user()->username}}さんの</p>
                    </div>
                    <div class="follow-count">
                        <p>フォロー数</p>
                        <p>{{Auth::user()->follows()->count()}}名</p>
                    </div>
                    <div class="follow-btn">
                        <p class="btn"><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                    </div>
                    <div class="follow-count">
                        <p>フォロワー数</p>
                        <p>{{Auth::user()->followers()->count()}}名</p>
                    </div>
                    <div class="follow-btn">
                        <p class="btn"><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a></p>
                    </div>
                </div>
            </div>
            <div class="side-search">
                <a href="/search" class="btn btn-primary">ユーザー検索</a>
            </div>
        </div>
    </div>
    
    <footer>
    </footer>
    <!--<script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    


    <script>
$('#MODAL1').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
  var post = button.data('post') //data-post の値を取得
  var id = button.data('id') //data-id の値を取得
  var modal = $(this)  //モーダルを取得
 
  modal.find('.modal-body input#postdata').val(post) //inputタグにも表示
  modal.find('.modal-body input#postid').val(id) 
})  
</script>
</body>

</html>
