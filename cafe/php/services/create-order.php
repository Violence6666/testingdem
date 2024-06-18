<?php 
    require '../database.php';
    try {
        $product = $_POST['product'];
        $quantity_of_guests = $_POST['quantity_of_guests'];
        $table_number = $_POST['table_number'];
        $status = $_POST['status'];
        mysqli_query($connect, "INSERT INTO orders (product, quantity_of_guests, table_number, status) VALUES ($product, $quantity_of_guests, $table_number, $status)");
        header("Location: ../../public/views/waiter/index.php");
        var_dump($_POST);
    } catch(Exception $error) {
        echo 'Произошла ошибка!';
    }
?>