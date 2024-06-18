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
            <h4>id повара: <?= $_SESSION['user']['id_user'] ?><br></h4>
                    <h4>Сотрудник: <?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></h4>
            </div>
            <div class="col-4">


            </div>
        </div>


        <table class="table table-success table-striped">
            <h1>Заказ</h2>
            <thead>
                <tr>
                    <th scope="col">id заказа</th>
                    <th scope="col">Номер смены</th>
                    <th scope="col">Блюдо</th>
                    <th scope="col">Стол №</th>
                    <th scope="col">Количество гостей</th>
                    <th scope="col">Статус оплаты</th>
                    <th scope="col">Готовность</th>
                    <th scope="col">Состояние</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once 'dbconnect.php';

                $query = "SELECT * FROM orders";
                $result = mysqli_query($connect,$query);

                // print_r($result);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id_orders'];
                    $id_dish = $row['id_dish_orders'];
                        $name = mysqli_query($connect, "Select `dish` FROM menu WHERE id_dish = '$id_dish'") or die ("Error : ".mysqli_error());;
                        $name_dish= mysqli_fetch_array($name);
                    ?>
                    <tr>
                    <th scope="row"><?= $row['id_orders']?></th>
                    <th scope="row"><?= $row['id_shift_orders']?></th>
                    <td><?=$name_dish['dish']?></td>
                    <td><?= $row['table']?></td>
                    <td><?= $row['number_of_people']?></td>
                    <td><?= $row['status_pay']?></td>
                    <td><?= $row['status_ready']?></td>
                    <td><?php if($row['status_ready'] != "Готов"){?><a class='btn btn-outline-danger' href="src/status_ready.php?id=<?=$id?>" >Готов</a></td><?php }else{}?>

                </tr>
<?php
                };
                ?>


            </tbody>

        </table>

    </div>

</body>
</html>