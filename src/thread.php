<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(() => {
            /**
             * Get the URL parameter value
             *
             * @param  name {string} パラメータのキー文字列
             * @return  url {url} 対象のURL文字列（任意）
             */
            function getParam(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            $('#sendBtn').on('click', () => {
                //検索結果表示
                var comment = $("#comment").val(); //comment ← 入力されたコメント
                $.post( //サーバにデータ送信
                    "comment.php", //プログラム名はcomment.php
                    { //以下は送信データのセット
                        "t_thread_id": getParam('t_thread_id'),
                        "comment": comment,
                    }
                );
                // alert('コメントが送信されました！');
                location.reload();
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
            <li id="title"><a id="header-link" href="../index.html">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="../form.html">アイデアを投稿する</a></li>
        </ul>
    </header>
    <div id=content></div>
    <div id="idea">
        <?php
        if (isset($_GET['t_thread_id'])) {
            require 'pdo.php';
            $_thread_id = $_GET['t_thread_id'];
            $sql = 'select * from t_thread,t_user where t_thread.t_thread_t_user_id=t_user.t_user_id and t_thread.t_thread_id = ?';
            $stmt = $pdo->prepare($sql); //プリペアードステートメント
            $stmt->bindValue(1, $_thread_id, PDO::PARAM_INT); //紐付け
            $stmt->execute(); //実行

            $result = $stmt->fetchall();
            // echo '<pre>';
            // echo var_dump($result);
            // echo '<pre>';
            // exit;

            $publisher = $result[0]['t_user_name'];
            echo '<p id="ideamain"> 
            ' . $result[0]['t_thread_title'] . '
            </p>
            <p id="postname"><a id="postname" href="#">' . $result[0]['t_user_name'] . '</a> さんの投稿</p>
            <div id="count">
            <button>すき</button>: 20
            <button>つくりたい</button>: 2
            閲覧数:149
            </div>';
        }
        ?>
    </div>
    <div id="chat">
        <?php
        if (isset($_GET['t_thread_id'])) {
            $_thread_id = $_GET['t_thread_id'];
            $sql = 'select * from t_user,t_thread,t_comment where t_comment.t_comment_t_thread_id=t_thread.t_thread_id and t_comment.t_comment_t_user_id=t_user.t_user_id and t_thread_id = ? order by t_comment.t_comment_created_at';
            $stmt = $pdo->prepare($sql); //プリペアードステートメント
            $stmt->bindValue(1, $_thread_id, PDO::PARAM_INT); //紐付け
            $stmt->execute(); //実行

            $result = $stmt->fetchall();
            // echo '<pre>';
            // echo var_dump($result);
            // echo '<pre>';
            // exit;

            if (count($result)) {
                foreach ($result as $array) {
                    if ($publisher === $array['t_user_name']) {
                        echo '<img id="accountimg" src="../img/account.png" alt="" width="50px" ><p id="mycomment">' . $array['t_comment_created_at'] . ' :' . $array['t_user_name'] . ' <br>' . $array['t_comment_content'] . '<button id="yoki">良き:4</button></p>';
                    } else {
                        echo '<img id="accountimg" src="../img/account.png" alt="" width="50px" ><p id="othercomment">' . $array['t_comment_created_at'] . ' :' . $array['t_user_name'] . ' <br>' . $array['t_comment_content'] . '<button id="yoki">良き:4</button></p>';
                    }
                }
            } else {
                echo '<img id="accountimg" src="../img/account.png" alt="" width="50px" ><p>コメントはありません!</p>';
            }
        }
        ?>
    </div>
    <form>
        <p>コメントを投稿する</p>
        <textarea id="comment" cols="30" rows="5"></textarea>
        <button id="sendBtn" class="btn btn--orange btn--radius">投稿する</button>
    </form>
    <div id="signage">
        <a href="../List.html" class="btn btn--orange btn--radius">アイデアリストに戻る</a>
    </div>
</body>

</html>