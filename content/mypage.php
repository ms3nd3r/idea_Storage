<?php
$title = '投稿されたアイデア';
require '../inc/head.php';
?>
</head>
<?php
require '../inc/header.php';
?>
</header>
<h2 id=new>マイページ</h2>

<div id="main">
    <?php
    if (isset($_SESSION['user_name'])) {
        echo '<dl id="user">
        <dt>ユーザ名</dt>
        <dd>'.$_SESSION['user_name'].'</dd>
        </dl>';
    } else {
        echo '<dl id="user">
        <dt>ユーザ名</dt>
        <dd>ゲスト</dd>
        </dl>';
    }

    ?>
</div>
</body>

</html>