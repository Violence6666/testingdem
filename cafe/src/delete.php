<?php
require_once '../dbconnect.php';

$id= $_GET["id"];
// print_r($id);
$rresult =  mysqli_query($connect,  "UPDATE `users` SET `status` = 'Уволен' WHERE `users`.`id_user` = $id;") or die ("Error : ".mysqli_error());
header('Location: ../admin.php');

?>