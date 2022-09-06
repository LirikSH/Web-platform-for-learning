<?php
session_start();
require_once 'connectBD.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$check_login = mysqli_query($connect, "select * from `person` where `email` = '$email'");


if (mysqli_num_rows($check_login)>0) {
    $_SESSION['message'] = 'Такой логин уже существует!';
    header('Location: ../HTML/registerPageStudent.php');
} else {
    if ($password === $password_confirm) {
        $password = md5($password);
        //      Заполнение таблицы person
        mysqli_query($connect, "INSERT INTO `person` (`full_name`, `email`, `role`, `password`) VALUES ('$full_name', '$email', 'student', '$password')");

        //      Заполнение таблиц student
            mysqli_query($connect,"INSERT INTO `student` (id_person) SELECT max(id_person) from `person` WHERE person.role = 'student'");

            mysqli_query($connect,"INSERT INTO `kurs_student` (id_student, id_kurs, status) SELECT max(id_student), 1, 'unlock' from `student`");
            mysqli_query($connect,"INSERT INTO `test_student` (id_kurs_student) SELECT max(id_kurs_student) from `kurs_student`");
            mysqli_query($connect,"INSERT INTO `kurs_result` (id_kurs_student, id_kurs_professor) SELECT max(id_kurs_student), 1 from `kurs_student`");

            mysqli_query($connect,"INSERT INTO `kurs_student` (id_student, id_kurs, status) SELECT max(id_student), 2, 'lock' from `student`");
            mysqli_query($connect,"INSERT INTO `test_student` (id_kurs_student, number_test) SELECT max(id_kurs_student), 2 from `kurs_student`");
            mysqli_query($connect,"INSERT INTO `kurs_result` (id_kurs_student, id_kurs_professor) SELECT max(id_kurs_student), 2 from `kurs_student`");




        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../HTML/loginPage.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../HTML/registerPageStudent.php');
    }
}