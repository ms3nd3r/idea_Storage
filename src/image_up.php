<?php

// ファイルへのパス
$path = '../img/';

// echo '<pre>';
// echo var_dump($_FILES['image']);
// echo '</pre>';
// exit;

// ファイルがアップロードされているかと、POST通信でアップロードされたかを確認
if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

    // ファイルを指定したパスへ保存する
    if (move_uploaded_file($_FILES['image']['tmp_name'], $path . $_POST['username'] . '.jpg')) {
        echo 'アップロードされたファイルを適応中。';

    } else {
        echo 'アップロードされたファイルの適応に失敗しました。';
    }
}

header('Location: ../content/idea_list.php');