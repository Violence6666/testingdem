<?php 
    require '../database.php';
    try {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        mysqli_query($connect, "INSERT INTO employees (login, password, name, role) VALUES ('$login', '$password', '$name', $role)");
        header("Location: ../../public/views/admin/index.php");
    } catch(Exception $error) {
        echo 'Произошла ошибка!';
    }
?>