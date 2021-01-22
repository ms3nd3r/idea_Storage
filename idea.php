<?php $title = "アイデア共有"; ?>
<?php include("inc/header.php"); ?>

    <div id="idea">
        <p id="ideamain"> 
            両片想いで他から見たらすでに出来ているであろう仲になっているのに、<br>
            当人同士は相手の気持ちを考えてずっとああでもない、こうでもないと悩んでいる作品をください！
        </p>
        <p id="postname"><a id="postname" href="#">読み手A</a> さんの投稿</p>
        <div id="count">
            <button>すき</button>: 20
            <button>つくりたい</button>: 2
            閲覧数:149
        </div>
    </div>
    
    <div id="chat">
        <h2>チャット</h2>
        <img id="accountimg" src="account.png" alt="" width="50px" ><p id="mycomment">2020/12/16 10:10 :読み手A <br>
        こんなアイデアを出してみました、いかがでしょうか！<button id="yoki">良き:4</button></p>
        <img id="accountimg" src="account.png" alt="" width="50px"><p id="othercomment">2020/12/16 18:32 :書き手A <br>
        うおぉ！！いいですねっ！○○と△△の二次創作シチュエーションとして使っても大丈夫ですか？<button id="yoki">良き:1</button></p>
        <img id="accountimg" src="account.png" alt="" width="50px"><p id="othercomment">2020/12/16 19:13 :書き手B <br>
        Bと申します。自分はオリジナル作品の一節として使ってみたいのですが、お借りして良いですか？<button id="yoki">良き:1</button></p>
        <img id="accountimg" src="account.png" alt="" width="50px"><p id="mycomment">2020/12/16 20:51 :読み手A <br>
        ＞＞書き手Aさん、Bさん<br>
        OKです、ぜひ使ってみてください！楽しみにしています！！(*'▽')<button id="yoki">良き:3</button></p>
        
    </div>
    
    <div id="form">
        <p>入力フォーム</p>
        <p>コメント: <br><textarea name="" id="" cols="100" rows="10"></textarea></p>
        <button>送信する</button>
    </div>
</body>
</html>