<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container col-3 shadow-lg p-3 mb-5 bg-white rounded border border-success" style="
    margin-top: 20vh;">
    <h3>Авторизация сорудника</h3>
    <hr>
    <form method="post" action="src/singin.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Логин</label>
        <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="">
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="text-end">
      <button type="submit" name="send" class="btn btn-success">Войти</button>
</div>
    </form>
</div>
</body>
</html>