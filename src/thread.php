<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(() => {
            $("#content").load("src/thread.php"); //thread.phpを実行させ結果取得＆投稿一覧の欄に反映
            $('#sendBtn').on('click', () => {
                //検索結果表示
                var search_form = $("#search_form").val(); //comment ← 入力されたコメント
                $('#detail').load( //サーバにデータ送信
                    "src/thread_search.php", //プログラム名はcomment.php
                    { //以下は送信データのセット
                        "comment": comment
                    }
                );
                alert('コメントが送信されました！')
                return false;
            });
        });
    </script>
    <link rel="stylesheet" href="../style.css">
    <title>投稿されたアイデアの一覧</title>
</head>

<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="index.html">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="form.html">アイデアを投稿する</a></li>
        </ul>
    </header>
    <div id=content></div>
    <div id="idea">
        <?php
        if (isset($_GET['t_thread_id'])) {
            require 'pdo.php';
            $_thread_id = $_GET['t_thread_id'];
            $sql = 'select t_thread_title from t_thread where t_thread_id = ?';
            $stmt = $pdo->prepare($sql); //プリペアードステートメント
            $stmt->bindValue(1, $_thread_id, PDO::PARAM_INT); //紐付け
            $stmt->execute(); //実行

            $result = $stmt->fetchall();
            echo $result[0]['t_thread_title'];
        }
        ?>
    </div>
    <div id="chat">
        <?php
        ?>
    </div>
    <form>
        <p>コメントを投稿する</p>
        <textarea id="comment" cols="30" rows="5"></textarea>
        <button id="sendBtn" class="btn btn--orange btn--radius">投稿する</button>
    </form>
    <div id="signage">
        <a href="List.html" class="btn btn--orange btn--radius">アイデアリストに戻る</a>
    </div>
</body>

</html>