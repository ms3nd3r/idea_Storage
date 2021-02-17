function dataSet(userid){ //api.phpからスレッドのコメントを取得してhtmlにして表示する関数
    var threadid = getThreadId();
    $.ajax({
        type: 'GET',
        url: 'api.php',
        dataType: 'json',
        data: {
            id : threadid
        }
    })
        .done(function(data){
            //console.log(data) //デバッグ用
            
            $('#chat').empty();

            if(data == false){
                $('#chat').append('<h2>チャット<h2>');
                $('#chat').append('<p id=ideamain>投稿はありません</p><p id="postname"><a id="postname" href="#"></a></p>');
                return false;
            }
            
            $('#chat').append('<h2>チャット<h2>');

            for(var i=0; i<data.length; i++){
                var commentName = data[i].name;
                var commentValue = data[i].comment;
                var commentTime = data[i].time;
                var commentId = data[i].userid;

                
                $('#chat').append('<img id="accountimg" src="account.png" alt="" width="50px" >');
                if(commentId == userid){
                    $('#chat').append('<p id="mycomment" style="white-space:pre-wrap;">'+commentTime+' :'+commentName+'<br>'+commentValue+'<button id="yoki">良き:4</button></p>');
                }else {
                    $('#chat').append('<p id="othercomment" "white-space:pre-wrap;">'+commentTime+' :'+commentName+'<br>'+commentValue+'<button id="yoki">良き:4</button></p>');
                }
            }
        });
}

function postComment(userid){
    var threadid = getThreadId();
    var comment = $("#comment").val();
    $.ajax({
        type: 'POST',
        url: 'api.php',
        dataType: 'json',
        data: {
            threadId : threadid,
            comment : comment,
        }
    })
        .done(function(data){
            if(data){
                dataSet(userid);
            }else {
                alert('送信に失敗しました');
            }
    })
}

function getThreadId(){ //URLのGETパラメーターからidの値を取り出す関数
    var param = (new URL(document.location)).searchParams;
    
    return param.get('id');
}
