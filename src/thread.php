<?php
require './pdo.php';

$threadId = 3;

/*
スレッドの内容をデータベースから取得し表示
*/
/*
コメント登録も
*/
$threadData = ideaData($pdo, $threadId);

//print_r($threadData); //デバッグ用

echo '<p id=ideamain>'.$threadData["title"].'</p>';
echo '<p id="postname"><a id="postname" href="#">'.$threadData["name"].'</a> さんの投稿</p>';

/*以下関数*/
function ideaData($pdo, $id){ //スレッドidからスレッドの作者の名前とスレッドタイトルと日時を取得
    $sql = "SELECT s1.title, s1.name FROM (
                SELECT t_thread.t_thread_title AS title,
                       t_user.t_user_name AS name, 
                       t_thread.t_thread_id AS t_id 
                        FROM t_thread INNER JOIN t_user ON t_user.t_user_id = t_thread.t_thread_t_user_id
                            WHERE t_thread.t_thread_id = $id) AS s1";
    
    $stmt = $pdo->query($sql);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
}
