<?php
require './pdo.php';

$sql = 'select * from t_thread order by t_thread_id';
$stmt = $pdo->query($sql); //$pdo.query($sql);

$result = $stmt->fetchall(); //$stmt.fechall();返却

// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;
//デバッグ用

foreach ($result as $array) {
	echo "<p id='idea_List' style='white-space:pre-wrap;'><a id='goto_comment' class='thread' value='{$array['t_thread_id']}' href='#'>";								//以下５行でクライアントにHTMLを出力
	echo "<strong>{$array['t_thread_created_at']}</strong><br>";
	echo htmlspecialchars($array['t_thread_title']) . "<br><br>";
	echo "</a></p>";
}
