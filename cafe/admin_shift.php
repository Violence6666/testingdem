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
            <a class="btn btn-primary" href="insert_shift.php" role="button">Назначить на смену</a>
                <br>
                Таблицы:<br>
                <a class="btn btn-primary" href="admin.php" role="button">Сотрудники</a>
                <a class="btn btn-primary" href="admin_orders.php" role="button">Заказы</a>
                <a class="btn btn-primary" href="admin_shift.php" role="button">Смены</a>

            </div>
        </div>


        <table class="table table-success table-striped">
            <h1>Смены</h2>
            <thead>
                <tr>
                    <th scope="col">id смены</th>
                    <th scope="col">id пользователя</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Номер смены</th>
                    <th scope="col">Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once 'dbconnect.php';

                $query = "SELECT * FROM shift";
                $result = mysqli_query($connect,$query);

                // print_r($result);
                while($row = mysqli_fetch_array($result)){
                    $id_user = $row['id_user_shift'];

                    $query1 = "SELECT * FROM users where id_user = '$id_user'";
                    $result1 = mysqli_query($connect,$query1);
                    $row1 = mysqli_fetch_array($result1);

                    ?>
                    <tr>
                    <th scope="row"><?= $row['id_shift'] ?></th>
                    <td><?=$row['id_user_shift']  ?></td>
                    <td><?= $row1['name']  ?></td>
                    <td><?= $row1['surname']  ?></td>
                    <td><?= $row['shift_number']  ?></td>
                    <td><?= $row['date']  ?></td>

                </tr>
<?php
                };
                ?>


            </tbody>

        </table>

    </div>

</body>
</html>