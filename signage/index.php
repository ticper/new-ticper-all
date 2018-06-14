<!DOCTYPE HTML>
<html charset="UTF-8">
    <head>
        <!-- System Properties -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="style.php">
        <script type="text/javascript" src="../config/footerFixed.js"></script>

        <!-- Search Engine Block -->
        <meta name="robots" content="noindex,nofollow" />
        <!-- Title -->
        <title>サイネージ - Ticper</title>
    </head>
    <body>
        <div id="main">
        <?php
            require_once('../config/config.php');
            $signageid = 0;
            $sql = mysqli_query($db_link,"SELECT * FROM tp_food");
            while($result = mysqli_fetch_assoc($sql)){
                $signageid = $signageid + 1;
                $orgid = $result['OrgID'];
                $sql2 = mysqli_query($db_link,"SELECT * FROM tp_org WHERE OrgID = '$orgid'");
                $result2 = mysqli_fetch_assoc($sql2);

                print('<div id="'.$signageid.'">');
                print('<h1>'.$result2['OrgName'].'</h1>');
                print('<h1>'.$result2['OrgPlace'].'</h1><br>');
                print('<h2 class="food">'.$result['FoodName'].'</h2><br>');
                print('<h2 class="price">'.$result['FoodPrice'].'</h2>');
                print('<h2 class="stock">'.$result['FoodStock'].'</h2>');
                print('</div>');
            }
            $_SESSION['signageid'] = $signageid;
        ?>        
    </body>
    <div id="footer">食品の説明</div>
</html>