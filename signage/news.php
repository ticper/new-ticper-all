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
        <title>ニュース一覧 - Ticper</title>

        <!-- jQuery Import -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Materialize Import -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <!-- <meta http-equiv="refresh" content="5;URL='index.php'" /> -->
    </head>
    <body>
        <!-- Navbar -->
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">ニュース一覧</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php
                session_start();
                require_once('../config/config.php');
                $sql = mysqli_query($db_link, "SELECT MAX(NewsID) AS num FROM tp_news");
                $result = mysqli_fetch_assoc($sql);
                $max = $result['num'];
                $sql = mysqli_query($db_link, "SELECT OrgID, News FROM tp_news WHERE NewsID = '$max'");
                $result = mysqli_fetch_assoc($sql);
                    $oid = $result['OrgID'];
                    if($oid == 0) {
                        $oname = "文化祭実行委員会";
                    } else {
                        $sql = mysqli_query($db_link, "SELECT OrgName FROM tp_org WHERE OrgID = '$oid'");
                        $result2 = mysqli_fetch_assoc($sql);
                    }
                    while($result = mysqli_fetch_assoc($sql)) {
                        print('<div class="row"><div class="col s12"><h3>'.$result['OrgName'].'</h3></div></div>');
                        print('<div class="row"><div class="col s12"><font style="font-size: xx-large">'.$result['News'].'</font></div></div>');
                        print('<div class="row"><div class="col s12"><font style="font-size: x-large">他のニュースはスマホ版Ticperでご覧ください。</font></div></div>');
                    }
            ?>
        </div>
    </body>
</html>