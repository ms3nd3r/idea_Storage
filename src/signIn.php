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

    $sql = 'select * from t_user where t_user_email = :email';
    $stmt = $pdo->prepare($sql); //プリペアードステートメント
    $stmt->bindValue('email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll();
    $db_pwdhash = $result[0]['t_user_pwdhash'];
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';
    // exit;
    // デバッグ用
    
    //pwdhashとdb_pwdhashの比較
    if (password_verify($pwd, $db_pwdhash)) {
        echo 'success';
        
        //セッションを開始してセッション変数に情報を格納
        session_start();
        $_SESSION['user_id'] = $result[0]['t_user_id'];
        $_SESSION['user_name'] = $result[0]['t_user_name'];
        var_dump($_SESSION);

        header('Location: ../index.php');
    } else {
        echo 'fail';
    }
} else {
    echo ('入力してください');
}
