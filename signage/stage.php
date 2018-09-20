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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <meta http-equiv="refresh" content="5;URL='index.php'" />
    </head>
    <body>
        <!-- Navbar -->
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">ステージ企画一覧</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php
                session_start();
                $_SESSION['signage'] = 0;
                require_once('../config/config.php');
                $sql = mysqli_query($db_link, "SELECT COUNT(*) AS num FROM tp_stage WHERE Start = 1 AND Finish = 0");
                $result = mysqli_fetch_assoc($sql);
                if($result['num'] == 0) {
                    print('<div class="row"><div class="col s12"><h2>開催中のステージ企画はありません。</h2></div></div>');
                } else {
                    $sql = mysqli_query($db_link, "SELECT * FROM tp_stage WHERE Start = 1 AND Finish = 0");
                    while($result = mysqli_fetch_assoc($sql)) {
                        print('<div class="row"><div class="col s6"><h3>'.$result['StageName'].'</h3></div><div class="col s3"><h3>'.$result['StageTime'].'</h3></div><div class="col s3"><h3><b>現在開催中！</b></h3></div></div><hr />');
                    }
                }
                $sql = mysqli_query($db_link, "SELECT * FROM tp_stage WHERE Start = 0 AND Finish = 0 Limit 0, 5");
                while($result = mysqli_fetch_assoc($sql)) {
                    print('<div class="row"><div class="col s6"><h3>'.$result['StageName'].'</h3></div><div class="col s3"><h3>'.$result['StageTime'].'</h3></div><div class="col s3"><h3><b>開催予定！</b></h3></div></div><hr />');
                }
            ?>
        </div>
    </body>