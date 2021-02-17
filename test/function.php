<?php

function showError($msg){
    echo $msg;
}

function es($string){ //サニタイズ用の関数
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}