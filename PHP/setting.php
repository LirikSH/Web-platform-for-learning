<?php
session_start();
require_once 'connectBD.php';

$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $password = md5($password);
    //      Заполнение таблицы person
    mysqli_query($connect, "UPDATE `person` SET  password = '$password'");
    $_SESSION['setting'] = 'Пароль успешно изменён';
} else {
    $_SESSION['setting'] = 'Пароли не совпадают!';
}

header('Location: ../HTML/GeneralStudent/Setting.php');