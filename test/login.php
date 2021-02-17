<?php
require "function.php";
require "sql.php";

session_start();
$msg = "";

if (isset($_POST["name"]) && isset($_POST["pw"])){
    $name = $_POST["name"];
    $pw = $_POST["pw"];

    $id = userSearch($name, $pw);
    
    if($id){
        $_SESSION["id"] = $id["id"];
        header("location: ./thread.php");
    }else {
        $msg = "IDまたはPWが違います";
    }

}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inc/style.css">
    <title>ログイン</title>
</head>
<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="index.html">アイデアの貯蔵庫（仮題）</a></li>
            <li id="sub"><a id="header-link" href="form.html">アイデアを投稿したい</a></li>
            <li id="sub"><a id="header-link" href="List.html">アイデアを見つけて創作したい</a></li>
            <li id="account"><img src="account.png" alt="アイコン" width="50px"></li>
        </ul>
    </header>
    <h2 id="new">ログインフォーム</h2>
    <div id="login_form">
        <form method="POST" action="">
        <p style="color:red"><?php showError($msg);?></p>
        <p>ID:<input type="text" name="name" size="15"></p> 
        <p>パスワード:<input type="text" name="pw" size="15"></p>
        <p><input type="submit" value="ログイン" size="15"></p>
        </form>
    </div>
    <div id="send"><a href="List.html" class="btn btn--orange btn--radius">ログイン</a>
</body>
</html>