<?php 
    require '../database.php';
    try {
        $employee_id = $_GET['id'];
        mysqli_query($connect, "UPDATE employees SET status = 2 WHERE employee_id = $employee_id");
        header("Location: ../../public/views/admin/index.php");
    } catch(Exception $error) {
        echo 'Произошла ошибка!';
    }
?>