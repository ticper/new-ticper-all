<?php
    $News = $_POST['news'];
    require_once('config/config.php');
    $News = htmlspecialchars($News, ENT_QUOTES);//XSS
    $News = $db_link -> real_escape_string($News);//SQL Injection
    $sql = mysqli_query($db_link, "SELECT MAX(NewsID) AS num FROM tp_news");
    $result = mysqli_fetch_assoc($sql);
    $newsid = $result['num'] + 1;
    $sql = mysqli_query($db_link, "INSERT INTO tp_news VALUES ('$newsid', '0', '$News')");
    header('Location: t-news.php');
    exit();

?>