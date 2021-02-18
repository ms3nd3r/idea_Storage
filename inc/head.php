<?php
//セッション
if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../src/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../inc/style.css">
    <title><?= $title ?></title>
    <?php
//content
