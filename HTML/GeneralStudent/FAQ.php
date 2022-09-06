<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/General/FAQ.css">
</head>
<body>
<header>
    <div class="leftHeaderMenu">
        <a href="../Student/studentPage.php">
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
        <a href="MessageStudent.php">
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
    <!--Блок ссылок-->
    <div class="linkBar">
        <h2>Перейти к вопросу:</h2>
        <a href="#question1">Вопрос 1</a>
        <a href="#question2">Вопрос 2</a>
        <a href="#question3">Вопрос 3</a>
        <a href="#question4">Вопрос 4</a>
        <a href="#question5">Вопрос 5</a>
    </div>

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Часто задаваемые вопросы</h1>
        <div id="question1">
            <h2>Вопрос 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolor, laboriosam libero nostrum quae ut. Adipisci dolores id ipsum nisi perspiciatis tempore velit vero?</p>
        </div>
        <div id="question2">
            <h2>Вопрос 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolor, laboriosam libero nostrum quae ut. Adipisci dolores id ipsum nisi perspiciatis tempore velit vero?</p>
        </div>
        <div id="question3">
            <h2>Вопрос 3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolor, laboriosam libero nostrum quae ut. Adipisci dolores id ipsum nisi perspiciatis tempore velit vero?</p>
        </div>
        <div id="question4">
            <h2 >Вопрос 4</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolor, laboriosam libero nostrum quae ut. Adipisci dolores id ipsum nisi perspiciatis tempore velit vero?</p>
        </div>
        <div id="question5">
            <h2 >Вопрос 5</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet dolor, laboriosam libero nostrum quae ut. Adipisci dolores id ipsum nisi perspiciatis tempore velit vero?</p>
        </div>
        <div class="buttonBlock">
            <button class="returnButton">На главную страницу</button>
        </div>
    </div>
</div>
</body>
</html>

