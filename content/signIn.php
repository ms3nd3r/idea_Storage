<?php
$title = "ログインページ";
require "../inc/head.php";
?>
</head>
<?php
require '../inc/header.php';
?>
<h2 id="new">ログインフォーム</h2>
<div id="login_form">
    <form method="POST" action="../src/signIn.php">
        <p>Email:<input type="text" name="email" size="15"></p>
        <p>パスワード:<input type="text" name="password" size="15"></p>
        <div id="send"><input type="checkbox" name="cheked" id="">次回からは入力を省略</div>
        <div id="send"><input type="submit" class="btn btn--orange btn--radius" value="ログイン"></div>
        <a href='signUp.php'>新規登録はこちら</a>
    </form>
</div>
</body>

</html>