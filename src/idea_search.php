<?php
require './pdo.php';

/**
 * アイデアの検索処理
 * ../content/idea_list.phpから
 */

$keyword = explode(' ', $_POST['search_form']);
$sql = 'select * from t_thread where '; //名前付きプレースホルダ
$sql .= str_repeat('t_thread_title like ? and ', count($keyword) - 1);
$sql .= 't_thread_title like ?';

$stmt = $pdo->prepare($sql); //プリペアードステートメント
foreach ($keyword as $index => $word) {
    $stmt->bindValue($index + 1, '%' . $word . '%', PDO::PARAM_STR);
} //紐付け
$stmt->execute(); //実行

$result = $stmt->fetchall(); //$stmt.fechall();返却

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;
//デバッグ用

foreach ($result as $array) {
    echo "<p id='idea_List'><a id='goto_comment' class='thread' href='idea.php?t_thread_id={$array['t_thread_id']}'>";                                //以下５行でクライアントにHTMLを出力
    echo "<strong>{$array['t_thread_created_at']}</strong><br>";
    echo "{$array['t_thread_title']}<br><br>";
    echo "</a></p>";
}
