<?php
	$fp = fopen("idea.txt", "r");				//「bbs.txt」を読み込み目的で開く
	if($fp == false){							//開くのに失敗した場合
		exit(0);								//実行を終了する
	}
	while(true){								//以下を繰り返す
		$date = fgets($fp);						//$date ← ファイルから１行読み込む
		$idea_form = fgets($fp);					//$idea_form ← ファイルから１行読み込む
		
		if(feof($fp) == true){					//ファイルが終わっていたら
			break;								//ループを抜ける
		}
		
		echo "<p id='idea_List'>";								//以下５行でクライアントにHTMLを出力
		echo "<strong>{$date}</strong><br>";
		echo "{$idea_form}<br><br>";
		echo "</p>";
	}
	fclose($fp);								//ファイルを閉じる
?>
