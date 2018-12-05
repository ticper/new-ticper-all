<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ryo Nakagome
 * Date: 2018/11/28
 * Time: 午後 06:50
 */
    $id = $_GET['id'];

    require_once('config/config.php');
    $id = $db_link -> real_escape_string($id);//SQL Injection
    $sql = mysqli_query($db_link, "SELECT Start, Finish FROM tp_stage WHERE StageID = '$id'");
    $result = mysqli_fetch_assoc($sql);
    if($result['Start'] == '0' and $result['Finish'] == '0') {
        $sql = mysqli_query($db_link, "UPDATE tp_stage SET Start = 1 WHERE StageID = '$id'");
        header('Location: s-check.php');
        exit();
    } elseif ($result['Start'] == '1') {
        $sql = mysqli_query($db_link, "UPDATE tp_stage SET Finish = 1 WHERE StageID = '$id'");
        header('Location: s-check.php');
        exit();
    }
?>