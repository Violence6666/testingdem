<?php 
    require '../database.php';

    $sql_qeury = mysqli_query($connect , "SELECT shifts.shift_id, employees.name, shifts.date FROM shifts JOIN employees ON shifts.employee = employees.employee_id");
    $array = array();

    while($rowList = mysqli_fetch_array($sql_qeury)) {
        $name = array(
             'name' => $rowList['name'],
             'shift_id' => $rowList['shift_id'],
             'date' => $rowList['date'],
        );
        array_push($array, $name);
    }    
    echo json_encode($array);
?>