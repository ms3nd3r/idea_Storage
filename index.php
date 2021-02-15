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
            <li id="account"><a href="content/mypage.php"><img src="img/account.png" alt="アイコン" width="50px"></a></li>
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
        <a href="src/idea_list.php" class="btn btn--orange btn--radius">ENTER</a>
    </div>
</body>

</html>