<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$update_last_page = mysqli_query($connect, "UPDATE `kurs_student` SET last_page = 'videoPage.php' WHERE id_student = '$check_id' and id_kurs = 1");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Видео урока</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">


    <link rel="stylesheet" href="../../CSS/Student/videoPage.css">

    <script src="../../JS/curseButtons.js"></script>
</head>
<body>
<header>
    <div class="leftHeaderMenu">
        <a href="studentPage.php">
            Главная
        </a>
        <a href="../GeneralStudent/FAQ.php">
            FAQ
        </a>
        <a href="../GeneralStudent/Support.php">
            Поддержка
        </a>
        <a href="../GeneralStudent/Setting.php">
            Настройки
        </a>
        <a href="../GeneralStudent/MessageStudent.php">
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
    <!--Прогресс бар-->
    <div class="progressBar">
        <h2>Пройдено: 0%</h2>
        <a class="thisLesson" href="videoPage.php">Занятие 1</a>
        <a href="articlePage.php">Занятие 2</a>
        <a href="testPage.php">Тест</a>
        <a href="resultControlWorkPage.php">Итоговая работа</a>
        <a href="resultPage.php">Результаты</a>
    </div>

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Видео на тему: «История развития информационных технологий»</h1>
       <iframe  class="video" src="https://www.youtube.com/embed/O4iGaLEz_lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p>История информационных технологий берёт своё начало задолго до возникновения современной дисциплины информатика, появившейся в XX веке. Информационные технологии (ИТ) связаны с изучением методов и средств сбора, обработки и передачи данных с целью получения информации нового качества о состоянии объекта, процесса или явления.</p>
        <div class="buttonBlock">
            <button class="returnButton" onclick="videoPreview()">Назад</button>
            <button class="nextButton" onclick="videoNext()">Далее</button>
        </div>
    </div>
</div>
</body>
</html>
