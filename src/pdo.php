<?php
require "../env/env.php";

//例外処理
try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
        PDO::ATTR_EMULATE_PREPARES => false, //sqlインジェクション対策
    ]);
    // echo '接続成功';
} catch (PDOException $e) {
    // echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}
