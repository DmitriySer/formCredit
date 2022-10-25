<?php
session_start();
include_once 'function.php';
$month = clearData($_POST['term']);
$dateOpen = clearData(date('d.m.Y', strtotime($_POST['date'])));
$sum = clearData($_POST['sum1']);

switch ($month) {
    case'1':
        $month = 12;
        $date = strtotime('+1 years');
        break;
    case'2':
        $month = 24;
        $date = strtotime('+2 years');
        break;
    case'3':
        $month = 36;
        $date = strtotime('+3 years');
        break;
    case'4':
        $month = 48;
        $date = strtotime('+4 years');
        break;
}
$dateClose = date('d.m.Y', $date);
if (isset($_POST['but1'])) {
    if ($sum == 0){
        $_SESSION['msg'] = 'Укажите сумму   ';
        header('Location:index.php');
    }elseif ($month == 'На срок:'){
        $_SESSION['msg']= 'Выберете срок';
        header('Location:../index.php');
    }elseif(isset($sum)) {
        $res = ($sum + ($sum * (12 / 100))) / $month;
        $_SESSION['total'] = 'При сумме кредитования ' . $sum . '<br>' . 'Начиная от: ' .  $dateOpen . '<br>' . 'Заканчивая по: ' . $dateClose . '<br>' . 'Ваш ежемесечный платеж составит: ' . round($res);
        $_SESSION['res'] = round($res) . 'рублей в месяц. Последний платеж будет: ' . date('d.m.Y', $date);
        header('Location:../index.php');
    }
}

$sumV=clearData($_POST['sumV']);
$monthV=clearData($_POST['termV']);
switch ($monthV) {
    case'1':
        $monthV = 1;
        $date = strtotime('+1 year');
        break;
    case'2':
        $monthV = 2;
        $date = strtotime('+2 year');
        break;
    case'3':
        $monthV = 3;
        $date = strtotime('+3 year');
        break;
    case'4':
        $monthV = 4;
        $date = strtotime('+4 years');
        break;
}
if (isset($_POST['butV'])) {
    if ($sumV == 0){
        $_SESSION['msgV'] = 'Укажите сумму   ';
        header('Location:index.php');
    }elseif ($monthV == 'На срок:'){
        $_SESSION['msgV']= 'Выберете срок';
        header('Location:../index.php');
    }elseif(isset($sumV)) {
        $resV =$sumV + ($sumV * (7/ 100)) * $monthV;
        $_SESSION['totalV'] = 'При внесении ' . $_POST['sumV'] . '<br>' . 'Начиная от: ' . $dateOpen . '<br>' . 'Заканчивая по: ' . date('d.m.Y', $date) . '<br>' . 'В конце ваш вклад будет равен: ' . round($resV);
        $_SESSION['resV'] = round($resV) . ' ваш вклад будет равен к ' . date('d.m.Y', $date);
        header('Location:../index.php');
    }
}

$name = clearData($_POST['name']);
$inn = clearData($_POST['inn']);
$dateBir = clearData($_POST['dateBir']);
$serPass = clearData($_POST['serPass']);
$numPass = clearData($_POST['numPass']);
$datePass = clearData($_POST['datePass']);

require 'connect.php';
if (isset($_POST['subFiz'])) {
    $_SESSION['thanks'] = 'Заявка будет обработана, спасибо за ваше обращение.';
    mysqli_query($connect,"INSERT INTO `phiz` (`name`, `inn`,`pass_ser`,`pass_num`,`date_bir`,`date_pass`) VALUES ('$name','$inn','$serPass','$numPass','$dateBir','$datePass')");
    header('Location:../fiz.php');
}

$nameR = clearData($_POST['nameR']);
$innR = clearData($_POST['innR']);
$nameOrg = clearData($_POST['nameOrg']);
$addressOrg = clearData($_POST['address']);
$OGRN = clearData($_POST['OGRN']);
$innOrg = clearData($_POST['innOrg']);
$KPP = clearData($_POST['innOrg']);

if (isset($_POST['subUr'])) {
    $_SESSION['thanksUr'] = 'Заявка будет обработана, спасибо за ваше обращение.';
    mysqli_query($connect,"INSERT INTO `ur` (`inn`, `name_ruc`, `name_orc`, `address`, `OGRN`, `inn_org`, `KPP`) VALUES ('$innR', '$nameR', '$nameOrg', '$addressOrg', '$OGRN ', '$innOrg', '$KPP')");
    header('Location:../ur.php');
}