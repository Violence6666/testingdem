<?php 
session_start();

require_once '../dbconnect.php';
$login = $_POST["login"];
$password = $_POST["password"];
// print_r($login);
// print_r($password);

    


    $result = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password'") or die ("Error : ".mysqli_error());
    $user = mysqli_fetch_assoc($result);

    function user_true ($user_mass){
        global $login;
        global $password;
        global $connect;
        global $user;
        if($user_mass>0){
            $role = mysqli_query($connect, "Select `Role` FROM users WHERE login = '$login' AND password = '$password'") or die ("Error : ".mysqli_error());;
            $role = mysqli_fetch_array($role);
            print_r($role);
            $_SESSION['user'] = $user; 
            if($role['Role'] == 3){
                header('Location: ../admin.php');
            }
            if($role['Role'] == 2){
                header('Location: ../cook.php');
            }
            if($role['Role'] == 1){
                header('Location: ../waiter.php');
            }
        }else{
            header('Location: /dem/index.php');
        }
    };
    user_true($user);

?> 
