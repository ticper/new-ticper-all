<?php
    session_start();
    if(isset($_SESSION['A_UserID']) == '') {
    } else {
        print('<script>location.href = "home.php";</script>');
        exit();
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
        <title>ログイン - Ticper</title>

        <!-- jQuery Import -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Materialize Import -->
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
                        <li><a href="https://booth.yamabuki.ticper.com">会計用</a></li>
                        <li><a href="https://org.yamabuki.ticper.com">団体用</a></li>
                        <li><a href="https://yamabuki.ticper.com">顧客用</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="mobilemenu">
            <li><a href="https://booth.yamabuki.ticper.com">会計用</a></li>
            <li><a href="https://org.yamabuki.ticper.com">団体用</a></li>
            <li><a href="https://yamabuki.ticper.com">顧客用</a></li>
        </ul>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
        
        <!-- 本文 -->
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <form action="login.php" method="POST">
                        <h2>ログイン</h2>
                        <h5>ログインIDを入力してください。</h5>
                        <input type="text" name="UserID" placeholder="ログインID" />
                        <h5>パスワードを入力してください。</h5>
                        <input type="password" name="Password" placeholder="パスワード" />
                        <input class="btn" type="submit" class="送信" value="ログイン" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>