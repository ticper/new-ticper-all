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
        <title>ニュース - Ticper</title>

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
                    <h3>ニュース</h3>
                    <form action="t-addnews.php" method="POST">
                        <input type="text" name="news" placeholder="追加したいニュースを入力" class="validate" required>
                        <button type="submit" class="btn">送信</button>
                    </form>
                    <?php
                        require_once('config/config.php');
                        $sql = mysqli_query($db_link, "SELECT * FROM tp_news WHERE OrgID = '0'");
                        print('<table>');
                        print('<tr><th>内容</th><th>オプション</th></tr>');
                        while($result = mysqli_fetch_assoc($sql)) {
                            print("<tr><td>".$result['News']."</td><td><a href='t-deletenews.php?id=".$result['NewsID']."' class='btn'>削除</a></td></tr>");
                        }
                    ?>  
                </div>
            </div>
        </div>
    </body>
</html>
        