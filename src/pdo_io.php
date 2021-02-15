<?php
require  "./pdo.php";

/* 
データベース操作確認用
直接関係はありません
 */

//ユーザー入力なし query
// $sql = 'select * from t_thread';
// $stmt = $pdo->query($sql); //$pdo.query($sql);

// $result = $stmt->fetchall(); //$stmt.fechall();返却

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

//ユーザー入力あり prepare, bind, execute SQLインジェクション対策
$sql = 'select * from t_user where id = :id'; //名前付きプレースホルダ
$stmt = $pdo->prepare($sql); //プリペアードステートメント
$stmt->bindValue('id', 4, PDO::PARAM_INT); //紐付け
$stmt->execute(); //実行

$result = $stmt->fetchall(); //$stmt.fechall();返却

echo '<pre>';
var_dump($result);
echo '</pre>';

//トランザクション まとまって処理

//トランザクション まとまって処理 原子性 
// beginTransaction, commit, rollback
// ex)銀行 残高を確認->Aさんから引き落とし->Bさんに振り込み
$pdo->beginTransaction();

try {
    //sql処理
} catch (PDOException $e) {

    $pdo->rollBack();
}
