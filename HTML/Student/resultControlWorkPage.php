<?php
session_start();

require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];
$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$check_kurs_task = mysqli_query($connect, "SELECT kurs_task from `kurs` WHERE id_kurs = 1");
$check_kurs_task = mysqli_fetch_array($check_kurs_task);
$check_kurs_task = $check_kurs_task['kurs_task'];

$update_last_page = mysqli_query($connect, "UPDATE `kurs_student` SET last_page = 'resultControlWorkPage.php' WHERE id_student = '$check_id' and id_kurs = 1");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Итоговая работа</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/Student/resultWorkPage.css">
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
        <h2>Пройдено: 75%</h2>
        <a class="doneLesson" href="videoPage.php">Занятие 1</a>
        <a class="doneLesson" href="articlePage.php">Занятие 2</a>
        <a class="doneLesson" href="testPage.php">Тест</a>
        <a class="thisLesson" href="resultControlWorkPage.php">Итоговая работа</a>
        <a href="resultPage.php">Результаты</a>
    </div>

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Итоговая работа</h1>
        <p><?php echo $check_kurs_task?></p>
        <form action="../../PHP/resultControlWork.php" method="post" enctype="multipart/form-data">
            <h2>Комментарий к работе</h2>
            <textarea name="comment" placeholder="Ввведите текст"></textarea>
            <input type="file" name="file">
            <button class="resultButton" type="submit">Отправить работу</button>
        </form>
        <?php
        error_reporting(E_ERROR);
        if ($_SESSION['work']) {
            echo '<p class="result"> ' . $_SESSION['work'] . ' </p>';
        }?>



<!--        Работа отправлена-->
        <script>
            let resultButton = document.querySelector(".resultButton")
            let resultTitle = document.querySelector(".result")
            resultButton.onclick = function () {
                resultTitle.classList.remove("invisible")
            }
        </script>

        <div class="buttonBlock">
            <button class="returnButton" onclick="resultWorkPagePreview()">Назад</button>
            <button class="nextButton" onclick="resultWorkPageNext()">Далее</button>
        </div>
    </div>
</div>

</body>
</html>
