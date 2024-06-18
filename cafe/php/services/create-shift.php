<?php 
    require '../database.php';
    try {
        $employee_id = $_POST['employee_id'];
        $date = $_POST['date'];
        mysqli_query($connect, "INSERT INTO shifts (employee, date) VALUES ($employee_id, '$date')");
        header("Location: ../../public/views/admin/index.php");
    } catch(Exception $error) {
        echo 'Произошла ошибка!';
    }
?>