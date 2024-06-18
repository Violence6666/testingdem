<?php
function($_SESSION['user']){
    if (!$_SESSION['user']) {
        header('Location: index.php');
      }
}
?>