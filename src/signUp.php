<?php
require './pdo.php';

/**
 *  新規登録処理 
 * */

//ログイン状態でないか？
if (isset($_COOKIE['PHPSESSID'])) {
    echo 'ログアウトしてください';
    exit;
}


//入力値が適当か
if (
    !(!empty($_POST['user_name']) &&
        !empty($_POST['user_email']) &&
        !empty($_POST['user_password']) &&
        !empty($_POST['user_password2']) &&
        $_POST['user_password'] === $_POST['user_password2'])
) {
    echo 'もう一度入力しなおしてください';
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    exit;
}

// すでに登録されていないかを確認
$sql = 'select * from t_user where t_user_name = :name or t_user_email = :email';
$stmt = $pdo->prepare($sql); //プリペアードステートメント
$stmt->bindValue('name', $_POST['user_name'], PDO::PARAM_STR);
$stmt->bindValue('email', $_POST['user_email'], PDO::PARAM_STR);
$stmt->execute(); //実行
$result = $stmt->fetchall(); //$stmt.fechall();返却
if (!empty($result)) {
    echo '既に存在しています．';
    echo '<pre>';
    var_dump($result);
    echo '</pre>';
    exit;
}

// デバッグ用
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;

//登録処理
$params = [
    't_user_id' => null,
    't_user_name' => $_POST['user_name'],
    't_user_email' => $_POST['user_email'],
    't_user_pwdhash' => password_hash($_POST['user_password'], PASSWORD_BCRYPT)
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

$sql = 'insert into t_user (' . $columns . ')values(' . $values . ')';
// var_dump($sql);

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
echo '登録完了';