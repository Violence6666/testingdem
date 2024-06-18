<?php 
session_start();
$_SESSION['user']
?>
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

    <div class="container">
        


        <div class="row justify-content-center" style="margin: 12px">
            <div class="col-4">
                    <h4>id администратора: <?= $_SESSION['user']['id_user'] ?><br></h4>
                    <h4>Сотрудник: <?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></h4>
                
            </div>
            <div class="col-4">
            Инструменты:<br>
                <a class="btn btn-primary" href="insert_user.php" role="button">Добавить сотрудника</a>
                <br>
                Таблицы:<br>
                <a class="btn btn-primary" href="admin.php" role="button">Сотрудники</a>
                <a class="btn btn-primary" href="admin_orders.php" role="button">Заказы</a>
                <a class="btn btn-primary" href="admin_shift.php" role="button">Смены</a>

            </div>
        </div>


        <table class="table table-success table-striped">
            <h1>Сострудники</h2>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Пароль</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once 'dbconnect.php';

                $query = "SELECT * FROM users";
                $result = mysqli_query($connect,$query);

                // print_r($result);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id_user'];
                    ?>
                    <tr>
                    <th scope="row"><?= $row['id_user'] ?></th>
                    <td><?=$row['role']  ?></td>
                    <td><?= $row['name']  ?></td>
                    <td><?= $row['surname']  ?></td>
                    <td><?= $row['status']  ?></td>
                    <td><?= $row['login']  ?></td>
                    <td><?= $row['password']  ?></td>
                    <td><?php if($row['status'] != "Уволен"){?><a class='btn btn-outline-danger' href="src/delete.php?id=<?=$id?>" >Уволен</a></td><?php }else{}?>

                </tr>
<?php
                };
                ?>


            </tbody>

        </table>

    </div>

</body>
</html>