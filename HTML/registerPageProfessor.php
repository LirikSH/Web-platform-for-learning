<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация преподавателя</title>

    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
</head>
<body>
<form action="../PHP/registerProfessor.php" method="post" >
    <label>ФИО</label>
    <input type="text" placeholder="Введите ФИО" name="full_name" required>
    <label>Email</label>
    <input type="email" placeholder="Введите email" name="email" required >
    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль" name="password" required >
    <label>Подтверждение пароля</label>
    <input type="password" placeholder="Подтвердите пароль" name="password_confirm" required >
    <button type="submit">Зарегистрироваться</button>

    <p>У вас уже есть аккаунт? - <a href="loginPage.php" class="exit">Авторизируйтесь</a></p>
    <?php
    error_reporting(E_ERROR);
    if ($_SESSION['message']) {
        echo '<p class="errorPass"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</body>
</html>