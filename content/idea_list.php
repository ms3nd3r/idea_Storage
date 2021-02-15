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
                "../src/thread_search.php", //プログラム名はform.php
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
<form>
    <input id="search_form" type="text" placeholder="キーワードを入力">
    <button id="searchBtn">検索</button>
</form>
<div id="view">
    <h1 id="new">投稿一覧</h1>
    <div id="detail"></div>
</div>
<div id="signage">
    <a href="form.php" class="btn btn--orange btn--radius">アイデアを投稿する</a>
</div>
</body>

</html>