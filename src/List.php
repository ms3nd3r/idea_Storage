<?php
require './pdo.php';

$sql = 'select * from t_thread order by t_thread_id';
$stmt = $pdo->query($sql); //$pdo.query($sql);

$result = $stmt->fetchall(); //$stmt.fechall();返却

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
//デバッグ用

foreach ($result as $array) {
	echo "<p id='idea_List'>";								//以下５行でクライアントにHTMLを出力
	echo "<strong>{$array['t_thread_created_at']}</strong><br>";
	echo "{$array['t_thread_title']}<br><br>";
	echo "</p>";
}
