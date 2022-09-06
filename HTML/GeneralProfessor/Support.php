<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Поддержка</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/General/Support.css">
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
    <div class="contentLesson">
        <h1>Напишите  Ваш вопрос в поддержку</h1>
        <form action="../../PHP/supportProfessor.php" method="post" enctype="multipart/form-data">
            <label>Выберите область вопроса</label>
            <select name="ariaQuestion">
                <option value="Технический" selected>Технический</option>
            </select>
            <label>Введите тему обращения</label>
            <input type="text" placeholder="Тема" name="theme" class="themeSupport">
            <label>Введите текст обращения</label>
            <textarea name="textStudent" placeholder="Текст"></textarea>
            <input type="file" name="file">
            <div class="buttonBlock">
                <button class="resultButton" type="submit">Отправить обращение</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>