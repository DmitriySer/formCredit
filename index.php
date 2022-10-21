<?php

error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Вход в банк</title>
</head>

<body>
<div class="container">
    <div class="row">
        <pre>
        <?php

        ?>
        </pre>
        <div class="col-5 shadow-sm p-3 mb-5 bg-body rounded border border-warning">
            <form action="vendor/log.php" method="post">
                <h1 class="display-6">Кредитование</h1>
                <div class="input-group mb-3">
                    <span class="input-group-text">Введите сумму</span>
                    <input type="number" name="sum1" class="form-control">
                    <span class="input-group-text">₽</span>
                </div>
                <div class="input-group mb-3">
                    <label for="startDate" class="input-group-text">С даты</label>
                    <input name="date" class="form-control" type="date" />
                    <select class="form-select" name="term" >
                        <option selected>На срок:</option>
                        <option value="1">1 год.</option>
                        <option value="2">2 год.</option>
                        <option value="3">3 год.</option>
                        <option value="4">4 год.</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Ставка от 12%</span>
                    <span class="form-control bg-white " aria-describedby="button-addon1">
                         <?php
                         if ($_SESSION['res']) {
                             echo '<strong class="text-success">'.  $_SESSION['res'] .'</strong>' ;
                         }
                         unset($_SESSION['res']);
                         if ($_SESSION['msg']){
                             echo '<strong class="text-danger">'. $_SESSION['msg'].'</strong>';
                         }
                         unset($_SESSION['msg']);
                         ?>
                    </span>
                    <button class="btn btn-warning" name="but1" type="submit">Расчет</button>
                </div>
            </form>
        </div>
            <div class="col"></div>
            <div class="col-5 shadow-sm p-3 mb-5 bg-body rounded border border-warning">
                <form action="vendor/log.php" method="post">
                    <h1 class="display-6">Вклады</h1>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Введите сумму</span>
                        <input type="number" name="sumV" class="form-control">
                        <span class="input-group-text">₽</span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="startDate" class="input-group-text">С даты</label>
                        <input name="date" class="form-control" type="date"/>
                        <select class="form-select" name="termV" >
                            <option selected>На срок:</option>
                            <option value="1">1 год.</option>
                            <option value="2">2 года.</option>
                            <option value="3">3 года.</option>
                            <option value="4">4 года.</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Ставка 7%</span>
                        <span class="form-control bg-white " aria-describedby="button-addon1">
                         <?php
                         if ($_SESSION['resV']) {
                             echo '<strong class="text-success">'.  $_SESSION['resV'] .'</strong>' ;
                         }
                         unset($_SESSION['resV']);
                         if ($_SESSION['msgV']){
                             echo '<strong class="text-danger">'. $_SESSION['msgV'].'</strong>';
                         }
                         unset($_SESSION['msgV']);
                         ?>
                    </span>
                        <button class="btn btn-warning" name="butV" type="submit">Расчет</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6 col-md-4 shadow-sm p-3 mb-5 bg-body rounded border border-warning">
            <h1 class="display-6">Оформление</h1>
            <form action="vendor/signin.php" method="POST" class="needs-validation" novalidate>

                <div class="mb-3">
                    <?php
                    if ($_SESSION['total']){
                        echo '<p class="h5">Кредитование</p>';
                        echo $_SESSION['total'];
                    }
                    if ($_SESSION['totalV']){
                        echo '<p class="h5">Вклад</p>';
                        echo $_SESSION['totalV'];
                    }
                    ?>
                </div>
                <div class="input-group mb-3">
                <a class="btn btn-outline-warning" href="ur.php">Юр.лицо</a>
                <a class="btn btn-outline-warning" href="fiz.php">Физ.лицо</a>
                </div>
            </form>
        </div>
    </div>
<script src="vendor/main.js"></script>
</body>
</html>