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
    header('Location: ../HTML/registerPageProfessor.php');
} else {
    if ($password === $password_confirm) {
        $password = md5($password);
        //      Заполнение таблицы person, professor, kurs_professor
        mysqli_query($connect, "INSERT INTO `person` (`full_name`, `email`, `role`, `password`) VALUES ('$full_name', '$email', 'professor', '$password')");
        mysqli_query($connect,"INSERT INTO `professor` (id_person) SELECT max(id_person) from `person` WHERE person.role = 'professor'");
        mysqli_query($connect,"INSERT INTO `kurs_professor` (id_professor, id_kurs) SELECT max(id_professor), 1 from `professor`");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../HTML/loginPage.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../HTML/registerPageProfessor.php');
    }
}