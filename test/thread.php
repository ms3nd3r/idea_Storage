<?php
require "sql.php";
require "function.php";

session_start();

if(empty($_SESSION["id"])){
    echo "閲覧する為にはログインが必要です<br>";
    echo '<a href="./login.php">ログインする</a>';
    exit();
}

$userId = $_SESSION["id"];

//var_dump($userId); //デバッグ用

$threadId = isset($_GET["id"]) ? es($_GET["id"]) : ""; //$_GET["id"]が存在すればエスケープしたものを変数に代入、存在しなければ空の文字を代入
$threadData = ideaData($threadId);

//var_dump($threadData);
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../src/jquery-3.5.1.min.js"></script>
    <script src="thread.js"></script>
    <script>
    $(()=>{
        dataSet(<?=es($userId)?>); //domが生成された時に実行
        
        $('#sendBtn').on('click', ()=>{ //sendBtnが押された時に実行
            //postComment();
            postComment(<?=es($userId)?>); //セッション変数からユーザーIDを取り出す
            //alert('コメントが送信されました！')
        return false;
        });
    })  
    </script>
    <link rel="stylesheet" href="../inc/style.css">
    <title>投稿されたアイデアの一覧</title>
</head>

<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="index.html">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="form.html">アイデアを投稿する</a></li>
        </ul>
    </header>
    <div id="idea">
    <?php
    if($threadData){
    echo '<p id="ideamain" style="white-space:pre-wrap;">'.$threadData['title'].'</p>';
    echo '<p id="postname"><a id="postname" href="#">'.$threadData['name'].'</a> さんの投稿</p>';
    echo '<div id="count"><button>すき</button>: 20<button>つくりたい</button>: 2閲覧数:149</div>';
    }
    ?>
    </div>
    <div id="chat">
    </div>
    <form>
        <p>コメントを投稿する</p>
        <textarea id="comment" cols="30" rows="5"></textarea>
        <button id="sendBtn"  class="btn btn--orange btn--radius">投稿する</button>
    </form>
    <div id="signage">
        <a href="List.html" class="btn btn--orange btn--radius">アイデアリストに戻る</a>
    </div>
</body>

</html>