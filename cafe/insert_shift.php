<?php 

require_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Администратор</title>
    <link rel="stylesheet" href="css/index2.css">
</head>
<body>
<div class="container col-4 shadow-lg p-3 mb-5 bg-white rounded border border-success" style="
    margin-top: 20vh;">

<form class="" method="post" action="insert_shift.php" >

  <div class="">
    <label for="validationCustom01" class="form-label">id пользователя</label>
    <input type="text" name="idusershift" class="form-control"  value="" required>
  </div>
  <div class="">
      <label for="date" class="form-label">Дата</label>
      <input type="date" name="date" class="form-control" id="date">
  </div>
  <div class="">
      <label for="" class="form-label">Номер смены</label>
      <input type="text" name="shift_number" class="form-control" id="time">
    </div>


  <div class="" style="
    margin-top: 1vw;
">
  <a class="btn btn-primary" href="admin_shift.php" role="button">Отмена</a>
  <button type="submit" name="send" class="btn btn-primary">Сохранить</button>
  </div>

</form>
</div>

<?php 
    $send = $_POST['send'] ?? null;
    $id = $_POST['idusershift'] ?? null;; 
    $date = $_POST['date'] ?? null;;
    $shift_number = $_POST['shift_number'] ?? null;;

    // print_r($id);
    // print_r(" + ");
    // print_r($date);
    // print_r(" + ");
    // print_r($shift_number);

if(isset($send)){

$result = mysqli_query($connect, "INSERT INTO `shift` (`id_shift`, `id_user_shift`, `date`, `shift_number`) VALUES (NULL, '$id', '$date', '$shift_number');") or die ("Error : ".mysqli_error());
header('Location: admin_shift.php');
}



?>
    
</body>
</html>