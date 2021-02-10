<?php
$title = "アイデアの投稿";
require '../inc/head.php';
?>
<?php
require '../inc/header.php';
?>

<body>
    <script>
        $(() => {
            $('#sendBtn').on('click', () => {
                //[投稿する]ボタンが押されたとき
                console.log("ボタンが押されました！")
                var idea_form = $("#idea_form").val(); //idea_form ← 入力されたコメント
                $.post( //サーバにデータ送信
                    "../src/form.php", //プログラム名はform.php
                    { //以下は送信データのセット
                        "idea_form": idea_form
                    },
                    function() { //送信が完了した時の処理
                        console.log("データが送信されました！")
                        $("#idea_form").val(""); //コメント入力欄を空にする
                    }
                );

            });
        });
    </script>
    <h2 id="new">アイデア投稿フォーム</h2>
    <div id="form">
        <textarea id="idea_form" cols="30" rows="10"></textarea>
        <button id="sendBtn" class="btn btn--orange btn--radius">投稿する</button>
    </div>
    <div id="watch_idea">
        <a href="idea_list.php" class="btn btn--orange btn--radius">アイデアを見に行く</a>
    </div>
</body>

</html>