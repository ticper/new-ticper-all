<?php
    session_start();
    if(isset($_SESSION['A_UserID']) == '') {
        print('<script>location.href = "index.php";</script>');
    } else {
        $UserID = $_SESSION['A_UserID'];

        // 登録する落とし物情報を取得
        $hinmoku = $_POST['hinmoku'];
        $tokucho = $_POST['tokucho'];
        $place = $_POST['place'];
        
        // データベース情報を取得
        require_once('config/config.php');

        // htmlspecialchars
        $h_hinmoku = htmlspecialchars($hinmoku, ENT_QUOTES);
        $h_tokucho = htmlspecialchars($tokucho, ENT_QUOTES);
        
        // SQL文字を排除
        $s_hinmoku = $db_link -> real_escape_string($h_hinmoku);
        $s_tokucho = $db_link -> real_escape_string($h_tokucho);
        $sql = mysqli_query($db_link, "SELECT MAX(LostID) AS num FROM tp_lost");
        $result = mysqli_fetch_assoc($sql);
        $max = $result['num'] + 1;
        $sql = mysqli_query($db_link, "INSERT INTO tp_lost VALUES ('$max', '$s_hinmoku', '$s_tokucho', '$place', '$UserID', '0')");

        print('<script>alert("落とし物を登録しました。"); location.href = "l-list.php";</script>');
 
    }
?>