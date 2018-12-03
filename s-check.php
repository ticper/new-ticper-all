<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ryo Nakagome
 * Date: 2018/11/28
 * Time: 午後 05:28
 */
?>
<?php
session_start();
if(isset($_SESSION['A_UserID']) == '') {
    print('<script>location.href = "index.php";</script>');
    exit();
} else {
    $UserID = $_SESSION['A_UserID'];
}
?>
<!DOCTYPE HTML>
<html charset="UTF-8">
<head>
    <!-- System Properties -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Properties -->
    <!-- Search Engine Block -->
    <meta name="robots" content="noindex,nofollow" />
    <!-- Title -->
    <title>ステージ - Ticper</title>

    <!-- jQuery Import -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Materialize Import -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</head>
<body>
<!-- Navbar -->
<nav>
    <div class="container">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Ticper</a>
            <a href="#" data-target="mobilemenu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="l-list.php">落とし物</a></li>
                <li><a href="t-news.php">ニュース</a></li>
                <li><a href="s-check.php">ステージ</a></li>
            </ul>
        </div>
    </div>
</nav>
<ul class="sidenav" id="mobilemenu">
    <li><a href="l-list.php">落とし物</a></li>
    <li><a href="t-news.php">ニュース</a></li>
    <li><a href="s-check.php">ステージ</a></li>
</ul>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
</script>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>ステージ</h3>
            <table>
                <?php
                    require_once('config/config.php');
                    $sql = mysqli_query($db_link, "SELECT * FROM tp_stage");
                    print('<tr><th>ステージ名</th><th>時間</th><th>ステータス</th><th>操作</th>');
                    while ($result = mysqli_fetch_assoc($sql)) {
                        print('<tr><th>'.$result['StageName'].'</th><td>'.$result['StartTime'].'～'.$result['EndTime'].'</td><th>');
                        if($result['Start'] == '0' and $result['Finish'] == '0') {
                            print('<b>開始予定</b></th><td><a href="s-changestatus.php?id='.$result['StageID'].'" class="btn">ステージを開始する</a></td>');
                        } elseif($result['Start'] == '1' and $result['Finish'] == '0') {
                            print('<b>開催中</b></th><td><a href="s-changestatus.php?id='.$result['StageID'].'" class="btn">ステージを終了する</a></td>');
                        } elseif($result['Start'] == '1' and $result['Finish'] == '1') {
                            print('<b>開催済み</b></th><td>操作はありません</td>');
                        }
                        print('</tr>');
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>

