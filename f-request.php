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
                        $sql = mysqli_query($db_link, "SELECT OrgID, OrgName FROM tp_org");
                        while($result = mysqli_fetch_assoc($sql)) {
                            print('<h3>'.$result['OrgName'].'</h3>');
                            print('<table>');
                            $orgid = $result['OrgID'];
                            $sql2 = mysqli_query($db_link, "SELECT FoodID, FoodName FROM tp_food WHERE OrgID = '$orgid'");
                            while($result2 = mysqli_fetch_assoc($sql2)) {
                                print('<tr><th>'.$result2['FoodName'].'</th>');
                                $foodid = $result2['FoodID'];
                                $sql3 = mysqli_query($db_link, "SELECT count(*) AS num FROM tp_ticket WHERE FoodID = '$foodid' AND Requested = 0");
                                while($result3 = mysqli_fetch_assoc($sql3)) {
                                    print('<td><font size="5">'.$result3['num'].'</font>枚</td>');
                                    print('<td><form action="f-requestdo.php" method="POST"><input type="hidden" name="foodid" value="'.$foodid.'"><input type="hidden" name="count" value="'.$result3['num'].'"><button type="submit" class="btn">'.$result3['num'].'枚の調理を依頼する</button></form></td></tr>');
                                }
                            }
                            print('</table>');
                        }
                    ?>  
                </div>
            </div>
        </div>
    </body>
</html>
        