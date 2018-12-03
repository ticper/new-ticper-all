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
        <title>落とし物管理 - Ticper</title>

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
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="mobilemenu">
            <li><a href="l-list.php">落とし物</a></li>
            <li><a href="t-news.php">ニュース</a></li>
        </ul>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
        
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2>落とし物</h2>
                    <a href="l-add.php" class="btn">落とし物登録</a>
                    <table>
                        <tr><th>品目</th><th>特徴</th><th>発見場所</th><th>登録者</th><th>受け取り</th></tr>
                        <?php
                            require_once('config/config.php');
                            $sql = mysqli_query($db_link, "SELECT * FROM tp_lost");
                            while($result = mysqli_fetch_assoc($sql)) {
                                $placeid = $result['PlaceID'];
                                $sql2 = mysqli_query($db_link, "SELECT PlaceName FROM tp_place WHERE PlaceID = '$placeid'");
                                $result2 = mysqli_fetch_assoc($sql2);
                                $userid2 = $result['UserID'];
                                $sql2 = mysqli_query($db_link, "SELECT UserName FROM tp_user_all WHERE UserID = '$userid2'");
                                $result3 = mysqli_fetch_assoc($sql2);
                                print('<tr><td>'.$result['LostName'].'</td><td>'.$result['LostPoint'].'</td><td>'.$result2['PlaceName'].'</td><td>'.$result3['UserName'].'</td>');
                                if ($result['Got'] == "0") {
                                    print('<td><b>未受け取り</td><td><a class="btn" href="l-changestatus.php?id='.$result['LostID'].'">受け取り済にする</a></tr>');
                                } elseif($result['Got'] == "1") {
                                    print('<td><b>受け取り済</td><td><a class="btn red" href="l-changestatus.php?id='.$result['LostID'].'">未受け取りにする</a></tr>');
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
        