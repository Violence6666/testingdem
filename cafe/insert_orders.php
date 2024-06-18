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

<form class="" method="post" action="insert_orders.php" >
<div class="">
    <label for="validationCustom01" class="form-label">Номер смены</label>
    <input type="text" name="id_shift_orders" class="form-control"  value="" required>
  </div>

  <div class="">
  <label for="validationCustom04" class="form-label">Блюдо</label>
    <select class="form-select" name="id_dish_orders" id="validationCustom04" required>
      <?php
                      $query = "SELECT * FROM menu";
                      $result = mysqli_query($connect,$query);
                      while($row = mysqli_fetch_array($result)){
                        print_r("<option value=".$row['id_dish'].">".$row['dish']."</option>");
                        // echo"<option value='$row[id_dish]'>$dish</option>";

                      }

      ?>

    </select>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Столик</label>
    <input type="text" name="table" class="form-control"  value="" required>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Количестов гостей</label>
    <input type="text" name="number_of_people" class="form-control"  value="" required>
  </div>
  <div class="">
    <label for="validationCustom04" class="form-label">Статус оплаты</label>

  </div>
  <div class="" >
  <select class="form-select" name="status_pay" id="validationCustom04" required>
      <option value="Не оплачен">Не оплачен</option>
      <option value="Оплачен">Оплачен</option>
    </select>

  </div>



  <div class="" style="
    margin-top: 1vw;
">
  <a class="btn btn-primary" href="waiter.php" role="button">Отмена</a>
  <button type="submit" name="send" class="btn btn-primary">Сохранить</button>
  </div>

</form>
</div>

<?php 
    $send = $_POST['send'] ?? null;
    $id_dish_orders = $_POST['id_dish_orders'] ?? null;; 
    $id_shift_orders = $_POST['id_shift_orders'] ?? null;; 
    $table = $_POST['table'] ?? null;; 
    $number_of_people = $_POST['number_of_people'] ?? null;;
    $status_pay = $_POST['status_pay'] ?? null;;


if(isset($send)){

$result = mysqli_query($connect, "INSERT INTO `orders` (`id_orders`, `id_dish_orders`, `id_shift_orders`, `table`, `number_of_people`, `status_pay`, `status_ready`) VALUES (NULL, '$id_dish_orders', '$id_shift_orders', '$table', '$number_of_people', '$status_pay', 'Готовится');") or die ("Error : ".mysqli_error());
header('Location: waiter.php');
}



?>
    
</body>
</html>