<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="h-100">
        <div class="container">
            <div class="row justify-content-center align-items-center my-auto">
                <div class="col-5">
                    <form class="mt-5 border border-light-subtle p-4 shadow-sm rounded" action="../../php/services/auth.php" method="POST">
                        <h2 class="text-center">Авторизация</h2>
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input name="login" class="form-control" id="login" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Пароль</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-info text-white w-100 p-2 fw-bold">Войти</button>
                    </form>
                    <?php if(isset($_SESSION['error'])): ?>                  
                        <div class="alert text-bg-danger mt-2" role="alert">
                            <?= $_SESSION['error'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['error']); ?>
                </div>
            </div>
        </div>
    </body>
</html>