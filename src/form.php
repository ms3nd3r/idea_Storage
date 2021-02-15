<?php
require './pdo.php';

/**
 *  スレッド投稿処理 
 * */

$user_id = 1;
/**
 * ユーザーネームの取得処理
 */

$params = [
	't_thread_id' => null,
	't_thread_t_user_id' => $user_id,
	't_thread_title' => $_POST['idea_form'],
	't_thread_created_at' => null,
	't_thread_modified_at' => null,
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

$sql = 'insert into t_thread (' . $columns . ')values(' . $values . ')';
var_dump($sql);

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
