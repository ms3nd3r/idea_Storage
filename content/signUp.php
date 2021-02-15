<?php
$title = "ログインページ";
require "../inc/head.php";
?>
</header>
<?php
require "../inc/header.php";
?>

<h2 id="new">ログインフォーム</h2>
<div id="login_form">

    <p>ユーザーネーム:<input type="text" size="15"></p>
    <p>Email:<input type="text" size="15"></p>
    <p>パスワード:<input type="text" size="15"></p>
    <p>パスワード(確認):<input type="text" size="15"></p>
    <div id="send"><input type="checkbox" name="" id="">次回からは入力を省略</div>
</div>
<div id="send"><a href="List.php" class="btn btn--orange btn--radius">登録</a></div>
</body>
</html>