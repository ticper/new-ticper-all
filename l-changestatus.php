<?php
    $lid = $_GET['id'];
    require_once('config/config.php');
    $sql = mysqli_query($db_link, "SELECT Got FROM tp_lost WHERE LostID = '$lid'");
    $result = mysqli_fetch_assoc($sql);
    if($result['Got'] == '0') {
        $sql = mysqli_query($db_link, "UPDATE tp_lost SET Got = '1' WHERE LostID = '$lid'");
        header("Location: l-list.php");
        exit();
    } elseif($result['Got'] == '1') {
        $sql = mysqli_query($db_link, "UPDATE tp_lost SET Got = '0' WHERE LostID = '$lid'");
        header("Location: l-list.php");
        exit();
    }
?>