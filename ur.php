<?php
//require'log.php';
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
        <div class="col-6 col-md-5 shadow-sm p-3 mb-5 bg-body rounded border border-warning">
            <a href="index.php" class="btn btn-outline-warning">˂</a>
            <h1 class="display-6">Оформление юр.лица</h1>
            <?php if($_SESSION['thanksUr']){echo '<h3 style="color: darkgreen">' . $_SESSION['thanksUr']. '</h3>';} unset($_SESSION['thanksUr']);?>
            <form action="vendor/log.php" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ФИО руководителя</label>
                    <input type="text" class="form-control" name="nameR" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите данные" required>
                    <div class="invalid-feedback">
                        Пожалуйста заполните ФИО
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ИНН</label>
                    <input type="text" name="innR" class="form-control" id="exampleInputPassword1" placeholder="Введите данные" maxlength="12" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите ИНН
                    </div>
                </div>
                <h5 class="display-7">Данные организации</h5>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Наименование</label>
                    <input type="text" class="form-control" name="nameOrg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите данные" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите наименование организации
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Адрес</label>
                    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Введите данные" required >
                    <div class="invalid-feedback">
                        Нужно укзаать адрес
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ОГРН</label>
                    <input type="text" class="form-control" name="OGRN" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="13" placeholder="Введите данные" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите ОГРН
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ИНН</label>
                    <input type="text" name="innOrg" class="form-control" id="exampleInputPassword1" placeholder="Введите данные" maxlength="10" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите ИНН
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">КПП</label>
                    <input type="text" name="KPP" class="form-control" id="exampleInputPassword1" placeholder="Введите данные" maxlength="9" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите КПП
                    </div>
                </div>
                <div class="mb-3">
                    <?php
                    if ($_SESSION['total']){
                        echo '<p class="h5">Кредитование</p>';
                        echo $_SESSION['total'];
                    }
                    if ($_SESSION['totalV']){
                        echo '<br>';
                        echo '<p class="h5">Вклад</p>';
                        echo $_SESSION['totalV'];
                    }
                    ?>
                </div>
                <button type="submit" name="subUr" class="btn btn-warning">Оформить</button>
            </form>
        </div>
    </div>
</body>
<script src="vendor/main.js"></script>
</html>