<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Настройки</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/General/Setting.css">
</head>
<body>
<header>
    <div class="leftHeaderMenu">
        <a href="../Professor/professorPage.php">
            Главная
        </a>
        <a href="FAQ.php">
            FAQ
        </a>
        <a href="Support.php">
            Поддержка
        </a>
        <a href="Setting.php">
            Настройки
        </a>
        <a href="MessageProfessor.php">
            Сообщения
        </a>
    </div>

    <div class="rightHeaderMenu">
        <span>
        <?= $_SESSION['user']['full_name']?>
         </span>

        <a href="../../PHP/logout.php" class="exit">
            выйти
        </a>
    </div>
</header>
<div class="content">
    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Настройка профиля</h1>
        <form action="../../PHP/setting.php" method="post">
            <label>ФИО</label>
            <input type="text" placeholder="Ввведите ФИО" name="full_name" value="<?php echo $_SESSION['user']['full_name']?>" disabled>
            <label>Email</label>
            <input type="email" placeholder="Введите email" name="email" value="<?php echo $_SESSION['user']['email']?>" disabled>
            <label>Пароль</label>
            <input type="password" placeholder="Введите пароль" name="password">
            <label>Подтверждение пароля</label>
            <input type="password" placeholder="Подтвердите пароль" name="password_confirm">
            <?php
            error_reporting(E_ERROR);
            if ($_SESSION['setting']) {
                echo '<p> ' . $_SESSION['setting'] . ' </p>';
            }
            unset($_SESSION['setting']);
            ?>
            <div class="buttonBlock">
                <button class="returnButton" type="reset">Отменить изменения</button>
                <button class="nextButton" type="submit">Сохранить изменения</button>
            </div>
        </form>
    </div>
</body>
</html>