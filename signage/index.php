<?php
    session_start();
?>
<!DOCTYPE HTML>
<html charset="UTF-8">
    <head>
        <!-- System Properties -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
        <link rel="stylesheet" href="style.php">

        <!-- Search Engine Block -->
        <meta name="robots" content="noindex,nofollow" />
        <script>
            setTimeout("location.href = 'stage.php'",
            <?php

                require_once('../config/config.php');
                $sql = mysqli_query($db_link,"SELECT COUNT(FoodID) AS num FROM tp_food");
                $result = mysqli_fetch_assoc($sql);
                $signageid = $result['num'];
                $time = $signageid * 12 * 1000;
                print($time);
            ?>
            );
        </script>
        <!-- Title -->
        <title>サイネージ - Ticper</title> 
    </head>
    <body>
        <div id="root">
            <div id="screen">
                <section class="contents">
                    <?php
                        $signageid = 0;
                        $sql = mysqli_query($db_link,"SELECT * FROM tp_food ORDER BY OrgID DESC");
                        while($result = mysqli_fetch_assoc($sql)){
                            $signageid = $signageid + 1;
                            $orgid = $result['OrgID'];
                            $sql2 = mysqli_query($db_link,"SELECT * FROM tp_org WHERE OrgID = '$orgid'");
                            $result2 = mysqli_fetch_assoc($sql2);
                            print('<div class="content">');
                            print('<h1 class="orgname"><b>'.$result2['OrgName'].'</b></h1>');
                            print('<h1 class="place">'.$result2['OrgPlace'].'</h1><br>');
                            print('<h2 class="food"><b>'.$result['FoodName'].'</b></h2><br>');
                            print('<h2 class="price">'.$result['FoodPrice'].'円</h2>');
                            if($result['FoodStock'] >= ($result['FoodStockFrom'] * 0.8)) {
                                print('<h2 class="stock green_bg">たくさんあります！</h2>');
                            } elseif ($result['FoodStock'] >= ($result['FoodStockFrom'] * 0.5)) {
                                print('<h2 class="stock blue_bg">まだあります！</h2>');
                            } elseif ($result['FoodStock'] > 0) {
                                print('<h2 class="stock yellow_bg"><b>残りわずかです</b></h2>');
                            } elseif ($result['FoodStock'] == 0) {
                                print('<h2 class="stock red_bg"><b>完売しました</b></h2>');
                            }
                            print('<div class="footer f_'.$signageid.'">'.$result['FoodDescription'].'</div>');
                            print('</div>');
                            
                        }
                    ?>
                </section>
            </div>
        </div>     
    </body>
</html> 