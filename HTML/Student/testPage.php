<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$test = mysqli_query($connect, "SELECT result_test FROM `test_student`, `kurs_student` where test_student.id_kurs_student = kurs_student.id_kurs_student and id_student = '$check_id'");
$testResult = mysqli_fetch_assoc($test);
$testResult = $testResult['result_test'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тест</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/Student/testPage.css">
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
        <h2>Пройдено: 50%</h2>
        <a class="doneLesson" href="videoPage.php">Занятие 1</a>
        <a class="doneLesson" href="articlePage.php">Занятие 2</a>
        <a class="thisLesson" href="testPage.php">Тест</a>
        <a href="resultControlWorkPage.php">Итоговая работа</a>
        <a href="resultPage.php">Результаты</a>
    </div>

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Тестовое задание</h1>
        <form action="../../PHP/test.php" method="post" >
            <div class="question">
                <h2>1. Система, предназначенная для хранения, поиска и обработки информации, и соответствующие организационные ресурсы (человеческие, технические, финансовые и т. д.), которые обеспечивают и распространяют информацию - это ...</h2>
                <h3>Введите свой ответ</h3>
                <input type="text" data-answer1="quest" name="Answer1">
            </div>

            <div class="question">
                <h2>2. Укажите функции управления предприятием, которые поддерживают современные информационные системы</h2>
                <h3>Виберите один или несколько ответов</h3>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="1"><label>Планирование</label></div>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="2"><label>Премирование</label></div>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="3"><label>Учёт</label></div>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="4"><label>Анализ</label></div>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="5"><label>Распределение</label></div>
                <div><input type="checkbox" name="Answer2[]" data-answer2="quest" value="6"><label>Регулирование</label></div>
            </div>

            <div class="question">
                <h2>3. Бизнес-процесс - это</h2>
                <h3>Виберите один ответ</h3>
                <div><input type="radio" name="Answer3" data-answer3="quest" value="1"><label>Множество управленческих процедур и операций</label></div>
                <div><input type="radio" name="Answer3" data-answer3="quest" value="2"><label>Множество действий управленческого персонала</label></div>
                <div><input type="radio" name="Answer3" data-answer3="quest" value="3"><label>Совокупность увязанных в единое целое действий, выполнение которых позволяет получить конечный результат (товар или услугу)</label></div>
            </div>

            <div class="question">
                <h2>4. Укажите правильное определение системы</h2>
                <h3>Виберите один ответ</h3>
                <div><input type="radio" name="Answer4" data-answer3="quest" value="1"><label>Система – это множество объектов</label></div>
                <div><input type="radio" name="Answer4" data-answer3="quest" value="2"><label>Система – это множество процессов</label></div>
                <div><input type="radio" name="Answer4" data-answer3="quest" value="3"><label>Система - это множество взаимосвязанных элементов или подсистем, которые сообща функционируют для достижения общей цели.</label></div>
            </div>

            <div class="question">
                <h2>5. Укажите функции управления предприятием, которые поддерживают современные информационные системы</h2>
                <h3>Виберите один или несколько ответов</h3>
                <div><input type="checkbox" name="Answer5[]" data-answer2="quest" value="1"><label>Взаимодействие информационных систем различного класса и уровня</label></div>
                <div><input type="checkbox" name="Answer5[]" data-answer2="quest" value="2"><label>Количество технических средств в информационной системе</label></div>
                <div><input type="checkbox" name="Answer5[]" data-answer2="quest" value="3"><label>Взаимодействие прикладных программ внутри информационной системы</label></div>
                <div><input type="checkbox" name="Answer5[]" data-answer2="quest" value="4"><label>Количество персонала, обеспечивающего информационную поддержку системе управления</label></div>
            </div>


        <p class="classP"></p>
        <button class="resultButton" type="submit">Узнать результат</button>
        </form>
        <?php
        error_reporting(E_ERROR);
        if ($_SESSION['test']) {
            echo '<span class="result" id="resultTitle">Результат: Вы набрали ' . $testResult . ' из 100 баллов!</span>';
        }?>
        <div class="buttonBlock">
            <button class="returnButton" onclick="testPreview()">Назад</button>
            <button class="nextButton" onclick="testNext()">Далее</button>
        </div>
    </div>
</div>
</body>
</html>

