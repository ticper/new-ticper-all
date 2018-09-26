<?php
    $ticketacode = $_GET['acode'];
    require_once('config/config.php');
    $sql = mysqli_query($db_link, "UPDATE tp_ticket SET Requested = 1 WHERE TicketACode = '$ticketacode'");
    header('Location: f-request.php');
    exit();
?>