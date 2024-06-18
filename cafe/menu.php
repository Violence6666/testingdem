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
            <h4>id официанта: <?= $_SESSION['user']['id_user'] ?><br></h4>
                    <h4>Сотрудник: <?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></h4>
            </div>
            <div class="col-4">
                Таблицы:<br>
                <a class="btn btn-primary" href="waiter.php" role="button">Заказы</a>
                <a class="btn btn-primary" href="menu.php" role="button">Меню</a>


            </div>
        </div>


        <table class="table table-success table-striped">
            <h1>Заказ</h2>
            <thead>
                <tr>
                    <th scope="col">id блюда</th>
                    <th scope="col">Название</th>

                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once 'dbconnect.php';

                $query = "SELECT * FROM menu";
                $result = mysqli_query($connect,$query);

                // print_r($result);
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                    <th scope="row"><?= $row['id_dish']?></th>
                    <td><?=$row['dish'] ?></td>

    

                </tr>
<?php
                };
                ?>


            </tbody>

        </table>

    </div>

</body>
</html>