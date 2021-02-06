<?php
require './pdo.php';

//GETでスレッドIDを受け取る
//$threadId = $_GET["t_thread_id"];

//SQL文でスレッドとアイデアを結合してコメントを出力するスレッドテーブルに呼び出し

//div id=ideaの部分には対応するアイデアを出力

//div id=chatの部分にも逐一出力
//echo で数行書く
//foreachで沢山出力

//コメントフォームの内容を読み取る
//form.phpをひねった形

function commentData($pdo, $id){ //スレッドidからコメントした人物の名前とコメントの内容と日時を取得
    $sql = "SELECT t_user.t_user_name AS user, 
                    t_comment.t_comment_content AS comment, 
                    t_comment.t_comment_created_at AS time 
                        FROM t_comment                    
                        INNER JOIN t_user ON t_user.t_user_id = t_comment.t_comment_t_user_id 
                        INNER JOIN t_thread ON t_thread.t_thread_id = $id";

    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

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