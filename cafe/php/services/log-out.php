<?php
    session_start();
    session_destroy();
    header("Location: ../../public/views/auth.php");
    exit;
?>