<?php
session_start();
require_once 'connectBD.php';

$email = $_POST['email'];
$role = $_POST['role'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "select * from `person` where `email` = '$email' and `password` = '$password'");
$check_email = mysqli_query($connect, "select * from `person` where `email` = '$email'");

if (mysqli_num_rows($check_email)>0) {
    if (mysqli_num_rows($check_user)>0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id_person" =>  $user['id_person'],
            "full_name" => $user['full_name'],
            "email" => $user['email'],
            "role" =>  $user['role']
        ];

        if ($user['role'] == 'student') {
            header('Location: ../HTML/Student/studentPage.php');
        }
        if ($user['role'] == 'professor') {
            header('Location: ../HTML/Professor/professorPage.php');
        }
        if ($user['role'] == 'administrator') {
            header('Location: ../HTML/admin/adminPage.php');
        }
    }
    else {
        $_SESSION['message'] = 'Неверный пароль!';
        header('Location: ../HTML/loginPage.php');
    }
}

else {
    $_SESSION['message'] = 'Такого email не существует!';
    header('Location: ../HTML/loginPage.php');
}
