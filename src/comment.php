<?php
require './pdo.php';

/**
 * スレッド投稿処理 
 */

//セッション
if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
}
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    /**
     * ユーザーネームの取得処理
     */

    $params = [
        't_comment_id' => null,
        't_comment_t_thread_id' => $_POST['t_thread_id'],
        't_comment_t_user_id' => $user_id,
        't_comment_content' => $_POST['comment'],
        't_comment_created_at' => null,
        't_comment_modified_at' => null,
    ];

    $count = 0;
    $columns = '';
    $values = '';

    foreach (array_keys($params) as $key) {
        if ($count++ > 0) {
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':' . $key;
    }

    $sql = 'insert into t_comment (' . $columns . ')values(' . $values . ')';
    var_dump($sql);

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}
