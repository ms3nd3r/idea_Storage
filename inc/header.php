<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="../index.php">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="form.php">アイデアを投稿したい</a></li>
            <li id="sub"><a id="header-link" href="idea_list.php">アイデアを見つけて創作したい</a></li>
            <li id="account">
                <!-- phpセッションによるユーザー情報の取得 -->
                <?php
                if (isset($_SESSION)) {
                    echo "<p>" . $_SESSION['user_name'] . "<a href='mypage.php'><img src='../img/account.png' alt='アイコン' width='50px'></a></p>";
                } else {
                    echo "<p>ゲスト<a href='mypage.php'><img src='../img/account.png' alt='アイコン' width='50px'></a></p>";
                }
                ?>
            </li>
        </ul>
    </header>
    <?php
//content