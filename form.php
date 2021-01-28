<?php
	date_default_timezone_set('Asia/Tokyo');
	$dateTime = date("Y/m/d H:i");					//$dateTime ← 現在の日時
	$idea_form = $_POST["idea_form"];					//$comment ← 受信した「comment」値
	
	$idea_form = str_replace("\n", "<br>", $idea_form);	//改行を<br>に置換
	
	$fp = fopen("idea.txt", "a");					//ファイル「bbs.txt」を追記で開く
	fputs($fp, "{$dateTime}\n");					//ファイルに $dateTime(日時)を書込
	fputs($fp, "{$idea_form}\n");						//ファイルに $comment(コメ)を書込む
	fclose($fp);									//ファイルを閉じる
?>