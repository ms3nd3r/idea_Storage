<?php

function commentInsert($threadId, $userId, $comment){
    $sql = "INSERT INTO t_comment VALUES ((SELECT MAX(s1.t_comment_id)+1 FROM t_comment AS s1), :threadId, :userId, :comment, null, null)";
    
    $pdo = pdoTry();
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(":threadId", $threadId, PDO::PARAM_INT);
    $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
    $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);

    if($stmt->execute()){
        return true;
    }else {
        return false;
    }
}

function userSearch($id, $pw){
    $sql = "SELECT t_user_id AS id from t_user WHERE t_user_name = :id AND t_user_pw = :pw";

    $pdo = pdoTry();
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->bindValue(":pw", $pw, PDO::PARAM_STR);
    $stmt->execute();
    $userId = $stmt->fetch();

    if($userId){
        return $userId;
    } else{
        return false;
    }
}

function ideaData($id){ //スレッドidからスレッドの作者の名前とスレッドタイトルと日時を取得
    
    if(!is_numeric($id)){ return false; } //$idが数字形式でない場合関数を終了する

    $sql = "SELECT s1.title, s1.name FROM (
                SELECT t_thread.t_thread_title AS title,
                       t_user.t_user_name AS name, 
                       t_thread.t_thread_id AS t_id 
                        FROM t_thread INNER JOIN t_user ON t_user.t_user_id = t_thread.t_thread_t_user_id
                            WHERE t_thread.t_thread_id = $id) AS s1";
    
    $pdo = pdoTry();
    $stmt = $pdo->query($sql);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($data)){
        return false;
    } else{
        return $data;
    }
}
    
function commentData($id){ //スレッドidからコメントした人物の名前とコメントの内容と日時を取得
    
    if(!is_numeric($id)){ return false; } //$idが数字形式でない場合関数を終了する
    
    $sql = "SELECT t_user.t_user_name AS name, 
                    t_comment.t_comment_content AS comment, 
                    t_comment.t_comment_created_at AS time, 
                    t_comment.t_comment_t_user_id AS userid 
                        FROM t_comment 
                            INNER JOIN t_user ON t_comment.t_comment_t_user_id = t_user.t_user_id 
                                    WHERE t_comment.t_comment_t_thread_id = $id";

    $pdo = pdoTry();
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($data)){
        return false;
    } else{
        return $data;
    }
}

function pdoTry(){ //db接続用メソッド

    $DB_HOST = "mysql:dbname=idea_Storage;host=localhost;charset=utf8";
    $DB_USER = "root";
    $DB_PASSWORD = "root";

    try {
        $pdo = new PDO($DB_HOST, $DB_USER, $DB_PASSWORD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
            PDO::ATTR_EMULATE_PREPARES => false, //sqlインジェクション対策
        ]);
    
    return $pdo;

    } catch (PDOException $e){
    echo '接続失敗' . $e->getMessage() . "\n";
    
    return;
    }
}
