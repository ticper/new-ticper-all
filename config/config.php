<?php
  $db_host = 'db.ticper.com:3306';
  $db_user = 'ticper';
  $db_pass = 'ticp-37648';
  $db_name = 'ticper';

  $db_link = new mysqli($db_host, $db_user, $db_pass, $db_name);
  mysqli_set_charset($db_link, 'utf8');

  $img_link = ('../../booth/img/');

  if (mysqli_connect_errno()) {
    printf("Connect Failed:".mysqli_connect_error());
    exit();
  }
  
  $signage = 1;
?>
