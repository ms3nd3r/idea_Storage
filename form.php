<?php $title = "アイデア投稿ページ"; ?>
<?php include("inc/header.php"); ?>

    <h2 id="new">アイデア投稿フォーム</h2>
    <div id="form">
        アイデアの内容:<br>
        <textarea name="idea" id="" cols="200" rows="4"></textarea>
        タグ:<br>
        <textarea name="tag" id="" cols="200" rows="1"></textarea>
        キャプション（チャットの最初のコメントとして投稿されます）: <br>
        <textarea name="caption" id="" cols="200" rows="10"></textarea>
        <input type="radio" name="R" id="">本アイデアはR-18作品向けです
        <input type="radio" name="R" id="" checked>本アイデアは全年齢向けです
        <div id="send"><input type="checkbox" name="" id="">投稿規約を確認しました</div>
        <div id="send"><a href="" class="btn btn--orange btn--radius">投稿する</a></div>
    </div>
</body>
</html>