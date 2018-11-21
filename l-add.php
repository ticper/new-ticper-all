<?php
    session_start();
    if(isset($_SESSION['A_UserID']) == '') {
        print('<script>location.href = "index.php";</script>');
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
        <title>落とし物追加 - Ticper</title>

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
                    <h2>落とし物追加</h2>
                    <a href="l-list.php" class="btn">戻る</a>
                    <form action="l-adddo.php" method="POST">
                        <p>品目</p>
                        <input type="text" name="hinmoku" class="validate">
                        <p>特徴</p>
                        <textarea name="tokucho" class="materialize-textarea"></textarea>
                        <p>発見場所</p>
                        <div class="input-field col s12">
                            <select name="place">
                                <?php
                                    require_once('config/config.php');
                                    $sql = mysqli_query($db_link, "SELECT * FROM tp_place ORDER BY PlaceFloor ASC");
                                    $floor = 0;
                                    while($result = mysqli_fetch_assoc($sql)) {
                                        print('<option value="'.$result['PlaceID'].'">'.$result['PlaceName'].'</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="登録" class="btn">
                    </form>
                    <script>
                        $(document).ready(function(){
                            $('select').formSelect();
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
        