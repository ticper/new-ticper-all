<?php
    $id = $_GET['id'];
    require_once('config/config.php');
    $id = $db_link -> real_escape_string($id);//SQL Injection
    $sql = mysqli_query($db_link, "DELETE FROM tp_news WHERE NewsID = '$id'");
    header('Location: t-news.php');
    exit();
?>