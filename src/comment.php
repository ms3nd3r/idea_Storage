<?php
require './pdo.php';

//GETでスレッドIDを受け取る
//$threadId = $_GET["t_thread_id"];
$threadId = 1;
$userId = 1; /* ユーザーidを識別する処理を書く*/

//SQL文でスレッドとアイデアを結合してコメントを出力するスレッドテーブルに呼び出し

//div id=ideaの部分には対応するアイデアを出力

//div id=chatの部分にも逐一出力
//echo で数行書く
//foreachで沢山出力

//コメントフォームの内容を読み取る
//form.phpをひねった形

$commentData = commentData($pdo, $threadId);

//print_r($commentData); //デバッグ用 

if(empty($commentData)){ //コメントが存在しなかった場合終了する
    exit("<br><br><br>");
}

echo "<h2>チャット</h2>";

foreach($commentData as $value){ //コメントを表示
    if($value["userid"] == $userId){    
        echo '<p id="mycomment">'.$value["time"].':'.$value["name"].'<br>'.$value["comment"].'</p>';
    }else {
        echo '<p id="othercomment">'.$value["time"].':'.$value["name"].'<br>'.$value["comment"].'</p>';
    }
}

/*以下関数*/
function commentData($pdo, $id){ //スレッドidからコメントした人物の名前とコメントの内容と日時を取得
    $sql = "SELECT t_user.t_user_name AS name, 
                    t_comment.t_comment_content AS comment, 
                    t_comment.t_comment_created_at AS time,
                    t_comment.t_comment_id AS userid 
                        FROM t_comment                    
                        INNER JOIN t_user ON t_user.t_user_id = t_comment.t_comment_t_user_id 
                        INNER JOIN t_thread ON t_thread.t_thread_id = $id";

    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}