<?php
    session_start();
    if(isset($_SESSION['A_UserID']) != '') {
        print('<script>alert("すでにログインしています。"); location.href = "home.php"; </script>');
    } else {
        require_once('config/config.php');
        
        $UserID = $_POST['UserID'];
        $Password = $_POST['Password'];

        $sql = mysqli_query($db_link, "SELECT UserID, Password FROM tp_user_all WHERE UserID = '$UserID'");
        $result = mysqli_fetch_assoc($sql);

        if($UserID == $result['UserID'] and password_verify($Password, $result['Password'])) {
            $_SESSION['A_UserID'] = $UserID;
            print('<script>location.href = "home.php"</script>');
        } else {
            print('<script>alert("ユーザー名、あるいはパスワードが間違っています。"); location.href = "index.php";</script>');
        }
    }