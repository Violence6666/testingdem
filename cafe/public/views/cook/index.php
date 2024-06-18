<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="h-100">
      <nav class="navbar navbar-expand-lg border-bottom shadow-sm mb-4 rounded">
        <div class="container-fluid">
          <a class="navbar-brand d-flex gap-2 align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width='28' fill="rgb(204, 44, 44)" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <?= $_SESSION['user']['name'].' ('.strtolower($_SESSION['user']['role']).')' ?>
        </a>
          <a href="../../../php/services/log-out.php" class="btn btn-danger">Выход</a>
        </div>
      </nav>
      <main>
        <div class="container mb-5" id="orders-section">
            <div class="row justify-content-center">
              <div class="col-10">
                    <div class="header d-flex gap-3 mb-3 align-items-center justify-content-between">
                      <h2>Заказы</h2>
                    </div>
                    <table id="employees-table" class="table table-striped table-bordered">
                  <thead>
                    <th>Номер</th>
                    <th>Продукт</th>
                    <th>Кол-во гостей</th>
                    <th>Номер стола</th>
                    <th>Статус</th>
                    <th>Действие</th>
                  </thead>
                  <tbody>
                    <?php require_once '../../../php/database.php';
                        $get_orders = mysqli_query($connect, "SELECT orders.order_id, menu.name, orders.quantity_of_guests, orders.table_number, order_statuses.name AS status FROM orders JOIN order_statuses ON orders.status = order_statuses.order_status_id JOIN menu ON orders.product = menu.product_id"); 
                        while($order = mysqli_fetch_array($get_orders)): ?>
                        <tr>
                          <td><?=$order['order_id']?></td>
                          <td><?=$order['name']?></td>
                          <td><?=$order['quantity_of_guests']?></td>
                          <td><?=$order['table_number']?></td>
                            <?php if($order['status'] == 'Оплачен' || $order['status'] == 'Готовится' || $order['status'] == 'Готов'): ?>
                              <td>
                                <select name="status_id" class="form-select" name="role">
                                <?php
                                  $get_order_statuses = mysqli_query($connect, "SELECT order_status_id, name from order_statuses WHERE NOT name = 'Принят'"); 
                                  while($status = mysqli_fetch_array($get_order_statuses)): 
                                    if($order['status'] == $status['name']): ?>
                                        <option selected value="<?=$status['order_status_id']?>"><?=$status['name']?></option>
                                      <?php else: ?>
                                        <option value="<?=$status['order_status_id']?>"><?=$status['name']?></option>
                                  <?php endif;
                                  endwhile; ?>
                                </select> 
                              </td>
                              <td class="d-flex align-items-center flex-column">
                                <a data-order-id="<?=$order['order_id']?>" class='btn btn-success change-order-status-btn'>Сохранить</a>
                              </td>
                            <?php else: ?>
                              <td><?=$order['status']?></td>
                              <td class="d-flex align-items-center flex-column">-</td>
                            <?php endif; ?>
                        </tr>
                      <?php endwhile; ?>                  
                  </tbody>
                </table> 
              </div>
            </div>
        </div>
      </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      $('.change-order-status-btn').on('click', function(e) {
        e.preventDefault()
        let current_element = $(e.target)
        let order_id = current_element.data('order-id')
        let current_row = e.target.closest('tr')
        let select_element_val = $(current_row).find('select').val()
        $.post(`../../../php/services/change-order-status.php`, {order: order_id, status: select_element_val})
      })
    </script>
  </body>
</html>