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
                var tag_form = $("#tag_form").val(); //tag_form ← 入力したタグ
                $.post( //サーバにデータ送信
                    "../src/form.php", //プログラム名はform.php
                    { //以下は送信データのセット
                        "idea_form": idea_form,
                        "tag_form": tag_form
                    },
                    function() { //送信が完了した時の処理
                        $("#idea_form").val(""); //コメント入力欄を空にする
                        $("#tag_form").val(""); //コメント入力欄を空にする
                        alert("データが送信されました！");
                    }
                );

            });
        });
    </script>
    <h2 id="new">アイデア投稿フォーム</h2>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<div id="form">';
        echo '<h3>アイデアの記述欄</h3>';
        echo '<textarea id="idea_form" cols="30" rows="10"></textarea>';
        echo '<h3>タグ<small>（関連するジャンルなどを何個でも書いてください）</small></h3>';
        echo '<input type="text" name="tag_form" id="tag_form">';
        echo '<p><button id="sendBtn" class="btn btn--orange btn--radius">投稿する</button></p>';
        echo '</div>';
    }else{
        echo '<div id="form"><p>投稿にはログインが必要です</p></div>';
    }
    ?>
    <div id="watch_idea">
        <a href="idea_list.php" class="btn btn--orange btn--radius" id="not_form_btn">アイデアを見に行く</a>
    </div>
</body>

</html>