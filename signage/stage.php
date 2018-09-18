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
                require_once('../config/config.php');
                $sql = mysqli_query($db_link, "SELECT * FROM tp_stage WHERE Start = 0 AND Finish = 0");
                $result = mysqli_fetch_assoc($sql);
                if($result['StageName'] == 0) {
                    print('<div class="row"><div class="col s12"><h2>開催中のステージ企画はありません。</h2></div></div>');
                }
                while($result = mysqli_fetch_assoc($sql)) {
                        print('<div class="row"><div class="col s5"><h2>'.$result['StageName'].'</h2></div><div class="col s5">'.$result['StageTime'].'</div><div class="col s2"><h4>現在開催中！</h4></div></div>');
                }
            ?>
        </div>
    </body>