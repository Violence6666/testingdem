<?php 
    session_start();
    require '../database.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = mysqli_fetch_array(mysqli_query($connect, "SELECT employees.login, employees.password, employees.name, roles.name AS role , employee_statuses.name AS status  FROM employees JOIN roles ON employees.role = roles.role_id JOIN employee_statuses ON employees.status = employee_statuses.employee_status_id WHERE login = '$login'"));
    if (empty($result)) {
        $_SESSION['error'] = 'Пользователь с таким логином не найден';
        header("Location: ../../public/views/auth.php");
        exit;
    } else if($result['password'] == $password) {
        $_SESSION['user'] = array(
            'login' => $result['login'],
            'name' => $result['name'],
            'role' => $result['role'],
            'status' => $result['status']
        );
        var_dump($result);
        switch($result['role']) {
            case 'Администратор':
                header("Location: ../../public/views/admin/index.php");
                break;
            case 'Повар':
                header("Location: ../../public/views/cook/index.php");
                break;
            case 'Официант':
                header("Location: ../../public/views/waiter/index.php");
                break;
            default:
                echo 'ERROR';
        }
        exit;
    } else {
        $_SESSION['error'] = 'Неправильный пароль';
        header("Location: ../../public/views/auth.php");
        exit;
    }
?>