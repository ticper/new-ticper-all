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
        <title>メニュー - Ticper</title>

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
                        <li><a href="l-list.php">落とし物</a></li>
                        <li><a href="signage.php">サイネージ操作</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="mobilemenu">
            <li><a href="l-list.php">落とし物</a></li>
            <li><a href="signage.php">サイネージ操作</a></li>
        </ul>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
        
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <?php
                        require_once('config/config.php');
                        print('<table>');
                        print('<tr><th></th><th>ID</th><th>団体</th><th>食品</th><th>枚数</th>');
                        $sql = mysqli_query($db_link, "SELECT * FROM tp_ticket WHERE Requested = 0");
                        while($result = mysqli_fetch_assoc($sql)) {
                            $fid = $result['FoodID'];
                            $sql2 = mysqli_query($db_link, "SELECT OrgID, FoodName FROM tp_food WHERE FoodID = '$fid'");
                            $result2 = mysqli_fetch_assoc($sql2);
                            $oid = $result2['OrgID'];
                            $fname = $result2['FoodName'];
                            $sql2 = mysqli_query($db_link, "SELECT OrgName FROM tp_org WHERE OrgID = '$oid'");
                            $result2 = mysqli_fetch_assoc($sql2);
                            $oname = $result2['OrgName'];
                            print("<tr><td><a href='f-requestdo.php?acode=".$result['TicketACode']."' class='btn'>調理依頼をする</a></td><td>".$result['TicketACode']."</td><td>".$oname."</td><td>".$fname."</td><td>".$result['Sheets']."</td></tr>");
                        }
                    ?>  
                </div>
            </div>
        </div>
    </body>
</html>
        