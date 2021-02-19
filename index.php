<?php
//セッション
if(isset($_COOKIE['PHPSESSID'])){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="inc/style.css">
    <title>idea_Storage</title>
</head>

<body>
    <header>
        <ul>
            <li id="title"><a id="header-link" href="index.php">idea_Storage</a></li>
            <li id="sub"><a id="header-link" href="content/form.php">アイデアを投稿したい</a></li>
            <li id="sub"><a id="header-link" href="content/idea_list.php">アイデアを見つけて創作したい</a></li>
            
                <!-- phpセッションによるユーザー情報の取得 -->
                <?php
                if (isset($_SESSION)) {
                    echo '<li id="Btn"><form action="" method="post">
                    <input type="submit" name="logoutBtn" value="ログアウトする" />
                </form></li>'; //押したらログアウト
                    echo "<li id='account'><p>" . $_SESSION['user_name'] . "<a href='mypage.php'><img src='./img/account.png' alt='アイコン' width='50px'></a></p>";
                } else {
                    echo '<li id="Btn"><a href="./content/signIn.php" class="btn btn--green btn--radius">ログインする</a></li>'; //押したらログイン画面に遷移
                    echo "<li id='account'><p>ゲスト</p>"; //ゲストへのアイコン情報を消しました（投稿も出来ないので）
                }
                if(isset($_POST['logoutBtn'])) {
                    //クッキーの削除
                    setcookie("PHPSESSID", "", time()-60);  //無反応
                    session_destroy();  //セッションが潰れた（クッキーは生存）
                    //リダイレクト
                    header('Location: ./index.php');
                }
                ?>
            </li>
        </ul>
    </header>
    <script>
        //html読み込み後
        $(() => {
            $('#loginBtn').on('click', () => {
                //ajaxによるログイン処理
            });
            $('#signinBtn').on('click', () => {
                //ajaxによる登録処理
            });
        });
    </script>
    <div id="about">
        <h1>idea_Storage</h1>
        <p>読む人から、共に作りあげる人に。<br>
            創る人から、心を満たす人に。</p>
        <div id="subscribe">
            <a href="./content/signUp.php" class="btn btn--orange btn--radius">登録する</a>
            <a href="./content/signIn.php" class="btn btn--orange btn--radius">ログインする</a>
        </div>
    </div>
    <div id="explanation">
        <p>
            本サイトは、読みたい創作物のアイデアを投稿する場所とそれを基に創作し供給する場所を提供し、
            その双方を繋ぐサービスです。<br>
            (現時点では自由にアイデアを投下し、好きなように受け取るページになっています。)
        </p>
    </div>
    <div id="subscribe">
        <a href="content/idea_list.php" class="btn btn--orange btn--radius">ログインせずにアイデアを見る</a>
        <p><small>※ログインをしない場合、コメント投稿など一部の機能に制限が掛かります。</small></p>
    </div>
</body>

</html>