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
    <title>Заявка физ.лица</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-6 col-md-5 shadow-sm p-3 mb-5 bg-body rounded border border-warning">
            <a href="index.php" class="btn btn-outline-warning">˂</a>
            <h1 class="display-6">Оформление физ.лица</h1>
            <?php if($_SESSION['thanks']){echo '<h3 style="color: darkgreen">' . $_SESSION['thanks'] . '</h3>';} unset($_SESSION['thanks']);?>
            <form action="vendor/log.php" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ФИО</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите как указано в пасспорте"required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите ФИО
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ИНН</label>
                    <input type="text" name="inn" class="form-control" id="exampleInputPassword1" placeholder="Введите данные" maxlength="12" required>
                    <div class="invalid-feedback">
                        Пожалуйста укажите ИНН
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Дата рождения:</label>
                    <input name="dateBir" class="form-control" type="date" required/>
                </div>
                <div class="input-group mb-2">
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Паспортные данные</label>
                        <input type="text" class="form-control" name="serPass" id="exampleInputEmail1" maxlength="4"
                               placeholder="серия" required>
                        <input type="text" class="form-control" name="numPass" id="exampleInputEmail1" maxlength="6"
                               placeholder="номер" required>

                    </div>
                    <div class="mb-3"></div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Дата выдачи</label>
                        <input name="datePass" class="form-control" type="date" placeholder="дата выдачи" required/>
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
                <button type="submit" name="subFiz" class="btn btn-warning">Оформить</button>
            </form>
        </div>
    </div>
</body>
<script src="vendor/main.js"></script>
</html>