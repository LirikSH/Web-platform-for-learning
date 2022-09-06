<?php
session_start();
require_once 'connectBD.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$check_login = mysqli_query($connect, "select * from `person` where `email` = '$email'");


if (mysqli_num_rows($check_login)>0) {
    $_SESSION['message'] = 'Такой логин уже существует!';
    header('Location: ../HTML/registerPageAdmin.php');
} else {
    if ($password === $password_confirm) {
        $password = md5($password);
        //      Заполнение таблицы person, admin
        mysqli_query($connect, "INSERT INTO `person` (`full_name`, `email`, `role`, `password`) VALUES ('$full_name', '$email', 'administrator', '$password')");
        mysqli_query($connect,"INSERT INTO `admin` (id_person) SELECT max(id_person) from `person` WHERE person.role = 'administrator'");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../HTML/loginPage.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../HTML/registerPageAdmin.php');
    }
}