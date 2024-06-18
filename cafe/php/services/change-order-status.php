<?php 
    require '../database.php';
    try {
        $order_id = $_POST['order'];
        $status_id = $_POST['status'];
        if(mysqli_query($connect, "UPDATE orders SET status = $status_id WHERE order_id = $order_id")) {
            echo true;
        }
    } catch(Exception $error) {
        echo 'Произошла ошибка!';
    }
?>