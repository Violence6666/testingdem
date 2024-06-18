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
      <nav class="navbar navbar-expand-lg border-bottom shadow-sm mb-4">
        <div class="container-fluid">
          <a class="navbar-brand d-flex gap-2 align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width='28' fill="rgb(0, 123, 224)" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <?= $_SESSION['user']['name'].' ('.strtolower($_SESSION['user']['role']).')' ?>
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#employee-section">Сотрудники</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#orders-section">Заказы</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#shifts-section">Смены</a>
            </li>
          </ul>
          <a href="../../../php/services/log-out.php" class="btn btn-danger">Выход</a>
        </div>
      </nav>
      <main>
        <div class="container mb-5" id="employee-section">
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="header d-flex gap-3 mb-3 align-items-center justify-content-between">
                <h2>Сотрудники</h2>
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-employee-modal">Добавить сотрудника</a>                
              </div>
              <table id="employees-table" class="table table-striped table-bordered">
                <thead>
                  <th>Логин</th>
                  <th>Пароль</th>
                  <th>Имя</th>
                  <th>Роль</th>
                  <th>Статус</th>
                  <th>Действие</th>
                </thead>
                <tbody>
                  <?php require_once '../../../php/database.php';
                      $get_employees = mysqli_query($connect, "SELECT employees.employee_id, employees.login, employees.password, employees.name, roles.name AS role, employee_statuses.name as status FROM employees JOIN roles ON employees.role = roles.role_id JOIN employee_statuses ON employees.status = employee_statuses.employee_status_id"); 
                      while($employee = mysqli_fetch_array($get_employees)): ?>
                      <tr>
                        <td><?=$employee['login']?></td>
                        <td><?=$employee['password']?></td>
                        <td><?=$employee['name']?></td>
                        <td><?=$employee['role']?></td>
                        <td><?=$employee['status']?></td>
                        <td class="d-flex align-items-center flex-column"><?php echo ($employee['status'] == 'Уволен') ? '-' : "<a class='btn btn-danger' href='../../../php/services/change-employee-status.php?id=".$employee["employee_id"]."'>Уволить</a>";?></td>
                      </tr>
                    <?php endwhile; ?>                  
                </tbody>
              </table> 
              <div class="modal fade" id="create-employee-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить сотрудника</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="../../../php/services/create-employee.php">
                        <div class="mb-3">
                          <label class="form-label">Логин</label>
                          <input name="login" class="form-control" >
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Пароль</label>
                          <input name="password" class="form-control" >
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Имя</label>
                          <input name="name" class="form-control" >
                        </div>
                        <div class="mb-3">
                          <select class="form-select" name="role">
                            <option selected>Выберите роль</option>
                            <option value="1">Повар</option>
                            <option value="2">Официант</option>
                            <option value="3">Администратор</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Готово</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container mb-5" id="orders-section">
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="header d-flex gap-3 mb-3 align-items-center justify-content-between">
                <h2>Заказы</h2>
              </div>
              <table id="orders-table" class="table-striped table-bordered ">
              </table>             
            </div>
          </div>
        </div>
        <div class="container mb-5" id="shifts-section">
          <div class="row justify-content-center">
            <div class="col-10">
            <div class="header d-flex gap-3 mb-3 align-items-center justify-content-between">
                <h2>Смены</h2>
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-shift-modal">Добавить смену</a>                
              </div>
              <table id="shifts-table" class="table-striped table-bordered">
              </table> 
              <div class="modal fade" id="create-shift-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить смену</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="../../../php/services/create-shift.php">
                        <div class="mb-3">
                          <select name="employee_id" class="form-select" name="role">
                            <option selected>Выберите сотрудника</option>
                            <?php require_once '../../../php/database.php';
                              $get_employees = mysqli_query($connect, "SELECT employee_id, name FROM employees"); 
                              while($employee = mysqli_fetch_array($get_employees)): ?>
                                <option value="<?=$employee['employee_id']?>"><?=$employee['name']?></option>
                              <?php endwhile; ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Выберите дату</label>
                          <input name="date" type="date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Готово</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="bootstrap-table.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
      let $orders_table = $('#orders-table');
      $orders_table.bootstrapTable({
        url: '../../../php/services/get-orders.php',
        minimumCountColumns: 2,
        columns: [{
          field: 'order_id',
          title: 'Номер',
          sortable: true,
        }, {
          field: 'name',
          title: 'Продукт',
        }, {
          field: 'quantity_of_guests',
          title: 'Кол-во гостей',
        }, {
          field: 'table_number',
          title: 'Номер стола',
        }, {
          field: 'status',
          title: 'Статус',
        }]
      });
      let $shifts_table = $('#shifts-table');
      $shifts_table.bootstrapTable({
        url: '../../../php/services/get-shifts.php',
        minimumCountColumns: 2,
        columns: [{
          field: 'shift_id',
          title: 'Номер',
          sortable: true,
        }, {
          field: 'name',
          title: 'Сотрудник',
        }, {
          field: 'date',
          title: 'Дата',
        }]
      });
    </script>
  </body>
</html>