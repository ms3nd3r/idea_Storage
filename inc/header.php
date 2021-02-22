<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="../index.php">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="form.php">アイデアを投稿したい</a></li>
            <li id="sub"><a id="header-link" href="idea_list.php">アイデアを見つけて創作したい</a></li>
                <!-- phpセッションによるユーザー情報の取得 -->
                <?php
                // セッション情報のデバッグ アイコン部分に表示
                // echo '<pre>';
                // var_dump($_SESSION);
                // echo '</pre>';
                if (isset($_SESSION['user_name'])) {
                    echo '<li id="Btn"><form action="../index.php" method="post">
                    <input type="submit" name="logoutBtn" value="ログアウトする" />
                </form></li>'; //押したらログアウト
                    echo "<li id='account'><p>" . $_SESSION['user_name'] . "<a href='mypage.php'><img src='../img/account.png' alt='アイコン' width='50px'></a></p>";
                } else {
                    echo '<li id="Btn"><a href="./signIn.php" class="btn btn--green btn--radius">ログインする</a></li>'; //押したらログイン画面に遷移
                    echo "<li id='account'><p>ゲスト</p>"; //ゲストへのアイコン情報を消しました（投稿も出来ないので）
                }
                
                ?>
            </li>
        </ul>
    </header>
    <?php
//content