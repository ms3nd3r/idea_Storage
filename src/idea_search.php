<?php
require './pdo.php';

/**
 * アイデアの検索処理
 * ../content/idea_list.phpから
 */

//タグと単語の分離
$tags = [];
$keyword = [];
foreach (explode(' ', $_POST['search_form']) as $index => $word) {
    if (strpos($word, '#') !== false) {
        $tags = explode('/', $word);
    } else {
        array_push($keyword, $word);
    }
}
// echo '<pre>';
// var_dump($tags, $keyword);
// echo '</pre>';
// exit;
//デバッグ用

$sql = 'select * from t_thread where '; //名前付きプレースホルダ
if (count($keyword) >= 1) {
    $sql .= str_repeat('t_thread_title like ? and ', count($keyword) - 1);
    $sql .= 't_thread_title like ?';
}
if (count($tags) >= 1) {
    if (count($keyword) >= 1) {
        $sql .= ' and ';
    }
    $sql .= str_repeat('t_thread_tag like ? and ', count($tags) - 1);
    $sql .= 't_thread_tag like ?';
}

$stmt = $pdo->prepare($sql); //プリペアードステートメント

foreach ($keyword as $index => $word) {
    $stmt->bindValue($index + 1, '%' . $word . '%', PDO::PARAM_STR);
}

foreach ($tags as $index => $tag) {
    $stmt->bindValue(count($keyword) + $index + 1, '%' . $tag . '%', PDO::PARAM_STR);
}
$tagsindex = 0;

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
