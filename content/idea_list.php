<?php
$title = '投稿されたアイデア';
require '../inc/head.php';
?>
<script>
    $(() => {
        $("#detail").load("../src/idea_list.php");
        //List.phpを実行させ結果取得＆投稿一覧の欄に反映
        $('#searchBtn').on('click', () => {
            //検索結果表示
            $('#detail').empty();
            var search_form = $("#search_form").val(); //search_form ← 入力されたコメント
            $('#detail').load( //サーバにデータ送信
                "../src/idea_search.php", //プログラム名はform.php
                { //以下は送信データのセット
                    "search_form": search_form
                }
            );
            return false; //このへんにクリックしたアイデアIDをcomment.phpに送るコードを書く
        });
    });
</script>
</head>

<?php
require '../inc/header.php';
?>
<div id="search">
    <form class="search_container">
        <input id="search_form" type="text" placeholder="キーワードを入力">
        <button id="searchBtn" style="float:right">検索</button>
    </form>
    <p>アイデアの文字列を検索する場合はそのまま、<br>タグを検索する場合は先頭に#を付けてください。</p>
</div>
<div id="view">
    <h1 id="new">投稿一覧</h1>
    <div id="detail"></div>
</div>
<div id="signage">
    <a href="form.php" class="btn btn--orange btn--radius" id="not_form_btn">アイデアを投稿する</a>
</div>
</body>

</html>