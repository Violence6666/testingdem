<?php 
    require '../database.php';

    $sql_qeury = mysqli_query($connect , "SELECT employees.employee_id, employees.login, employees.password, employees.name, roles.name AS role, employee_statuses.name as status FROM employees JOIN roles ON employees.role = roles.role_id JOIN employee_statuses ON employees.status = employee_statuses.employee_status_id");
    $array = array();

    while($rowList = mysqli_fetch_array($sql_qeury)) {
        $name = array(
             'login' => $rowList['login'],
             'name' => $rowList['name'],
             'password' => $rowList['password'],
             'role' => $rowList['role'],
             'status' => $rowList['status']
        );
        array_push($array, $name);
    }    
    echo json_encode($array);
?>