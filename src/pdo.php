<?php
require("../env/env.php");

const DB_HOST = $DB_HOST;
const DB_USER = $DB_USER;
const DB_PASSWORD = $DB_PASSWORD;


//例外処理
try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD);
    echo '接続成功';
} catch (PDOException $e) {
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}
