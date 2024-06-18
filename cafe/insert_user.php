<!DOCTYPE html>
<html lang="en">
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

<form class="" method="post" action="insert_user.php" >
<div class="">
    <label for="validationCustom04" class="form-label">Должность</label>
    <select class="form-select" name="role" id="validationCustom04" required>
      <option value="1">Официант</option>
      <option value="2">Повар</option>
      <option value="3">Администратор</option>
    </select>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Имя</label>
    <input type="text" name="name" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Фамилия</label>
    <input type="text" name="surname" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Логин</label>
    <input type="text" name="login" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="">
    <label for="validationCustom01" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control" id="validationCustom01" value="" required>
  </div>
  <div class="" style="
    margin-top: 1vw;
">
  <a class="btn btn-primary" href="admin.php" role="button">Отмена</a>
  <button type="submit" name="send" class="btn btn-primary">Сохранить</button>
  </div>

</form>
</div>

<?php 

require_once 'dbconnect.php';
$send = $_POST['send'] ?? null;
$role = $_POST['role']?? null;
$name = $_POST['name']?? null;
$surname = $_POST['surname']?? null;
$login = $_POST['login']?? null;
$password = $_POST['password']?? null;

if(isset($send)){
  $result = mysqli_query($connect, "INSERT INTO `users` (`id_user`, `role`, `status`, `name`, `surname`, `login`, `password`) VALUES (NULL, '$role', 'Работает', '$name', '$surname', '$login', '$password');") or die ("Error : ".mysqli_error());
  // header('Location: admin.php');
}



?>
    
</body>
</html>