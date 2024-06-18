<?php 
    require '../database.php';

    $sql_qeury = mysqli_query($connect , "SELECT orders.order_id, menu.name, orders.quantity_of_guests, orders.table_number, order_statuses.name AS status FROM orders JOIN order_statuses ON orders.status = order_statuses.order_status_id JOIN menu ON orders.product = menu.product_id");
    $array = array();

    while($rowList = mysqli_fetch_array($sql_qeury)) {
        $name = array(
             'order_id' => $rowList['order_id'],
             'name' => $rowList['name'],
             'quantity_of_guests' => $rowList['quantity_of_guests'],
             'table_number' => $rowList['table_number'],
             'status' => $rowList['status']
        );
        array_push($array, $name);
    }    
    echo json_encode($array);
?>