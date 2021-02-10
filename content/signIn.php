<?php
$title = "ログインページ";
require "./inc/header.php";
?>

<h2 id="new">ログインフォーム</h2>
<div id="login_form">
    <p>Email:<input type="text" size="15"></p>
    <p>パスワード:<input type="text" size="15"></p>
    <div id="send"><input type="checkbox" name="" id="">次回からは入力を省略</div>
    <a href='signUp.php'>新規登録はこちら</a>
</div>
<div id="send"><a href="List.php" class="btn btn--orange btn--radius">ログイン</a></div>
</body>
</html>