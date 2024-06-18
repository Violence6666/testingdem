<?php
require_once '../dbconnect.php';

$id= $_GET["id"];
// print_r($id);
$rresult =  mysqli_query($connect,  "UPDATE `orders` SET `status_ready` = 'Готов' WHERE `orders`.`id_orders` = $id;") or die ("Error : ".mysqli_error());
header('Location: ../cook.php');

?>