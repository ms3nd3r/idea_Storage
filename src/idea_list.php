<?php

require './pdo.php';

/**
 * 最初に表示されるアイデアのリストを表示させる
 * ../content/idea_list.phpから
 */

$sql = 'select * from t_thread order by t_thread_id';
$stmt = $pdo->query($sql); //$pdo.query($sql);

$result = $stmt->fetchall(); //$stmt.fechall();返却
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit;
//デバッグ用

foreach ($result as $array) {
	echo "<div id='idea_List' style='white-space:pre-wrap;'><a id='goto_comment' class='thread' href='idea.php?t_thread_id={$array['t_thread_id']}'>";								//以下５行でクライアントにHTMLを出力
	echo "<strong>{$array['t_thread_created_at']}</strong><br>";
	echo htmlspecialchars($array['t_thread_title']) . "<br>";
	if ($array["t_thread_tag"] != null) {
		echo "<span id='tag'>#{$array["t_thread_tag"]}</span>";
	}
	echo "</a></div>";
}
