<?php
    session_start();
    session_destroy();
?>
<script>alert("ログアウトしました。"); location.href = "index.php";</script>