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
        <dd>'.$_SESSION['user_name']. '</dd>
        <dt>アイコンの変更</dt>
        <dd>
            <form method="post" enctype="multipart/form-data" action="../src/image_up.php">
                <input type="hidden" name="username" value="'.$_SESSION['user_name'].'">
                <input type="file" name="image">
                <input type="submit" value="アップロード">
            </form>
        </dd>
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