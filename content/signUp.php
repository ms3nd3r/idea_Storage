<?php
$title = "ログインページ";
require "../inc/head.php";
?>
</header>
<?php
require "../inc/header.php";
?>

<h2 id="new">登録フォーム</h2>
<div id="login_form">
    <form method="POST" action="../src/signUp.php">
        <p>ユーザーネーム:<input type="text" name="user_name" size="15"></p>
        <p>Email:<input type="text" name="user_email" size="15"></p>
        <p>パスワード:<input type="text" name="user_password" size="15"></p>
        <p>パスワード(確認):<input type="text" name="user_password2" size="15"></p>
        <div id="send"><input type="checkbox" name="" id="">次回からは入力を省略</div>
        <div id="send"><input type="submit" class="btn btn--orange btn--radius" value="登録"></div>
    </form>
</div>
</body>

</html>