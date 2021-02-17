<?php
require "sql.php";
require "function.php";

$threadId = isset($_GET["id"]) ? es($_GET["id"]) : "";

if($threadId){
    $result = commentData($threadId); //sql.class.phpのほうでcommentDataメソッドを呼び出しコメントデータを取得

    header('Content-type: application/json'); 
    echo json_encode($result);  //json化して出力する
}

if(isset($_POST['threadId']) && isset($_POST['comment'])){
    session_start();
    $threadId = $_POST['threadId'];
    $comment = es($_POST['comment']);
    $userId = $_SESSION['id'];
    
    $result = commentInsert($threadId, $userId, $comment);

    header('Content-type: application/json'); 
    echo json_encode($result);  //json化して出力する
}