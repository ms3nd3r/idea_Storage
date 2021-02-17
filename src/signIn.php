<?php
require '../src/pdo.php';
/**
 * ログイン処理
 * ../content/signUp.phpから
 */

// フォームに入力されているかどうか
if ($_POST['email'] !== '' || $_POST['password'] !== '') {
    //password_verifyパラメータ取得
    $pwd = $_POST['password'];

    $sql = 'select t_user_pwdhash from t_user where t_user_email = :email';
    $stmt = $pdo->prepare($sql); //プリペアードステートメント
    $stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll();
    $db_pwdhash = $result[0]['t_user_pwdhash'];
    echo '<pre>';
    var_dump($db_pwdhash);
    echo '</pre>';
    // exit;

    //pwdhashとdb_pwdhashの比較
    if (password_verify($pwd, $db_pwdhash)) {
        echo 'success';
        //ここから下の処理の加工
        exit;

        foreach ($result as $array) {
            echo "<p id='idea_List'><a id='goto_comment' class='thread' href='idea.php?t_thread_id={$array['t_thread_id']}'>";                                //以下５行でクライアントにHTMLを出力
            echo "<strong>{$array['t_thread_created_at']}</strong><br>";
            echo "{$array['t_thread_title']}<br><br>";
            echo "</a></p>";
        }
    } else {
        echo 'fail';
    }
} else {
    echo ('入力してください');
}
