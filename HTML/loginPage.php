<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>

    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
</head>
<body>
    <form action="../PHP/login.php" method="post">
        <label>Email</label>
        <input type="email" placeholder="Введите email" name="email">
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name="password">
        <button type="submit">Войти</button>
        <p>У вас нет аккаунта? - <a href="registerPageStudent.php" class="exit">Зарегистрируйтесь</a></p>
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