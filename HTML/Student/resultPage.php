<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$check_id_kurs_student = mysqli_query($connect, "SELECT id_kurs_student from `kurs_student` WHERE id_student = '$check_id' and id_kurs = 1");
$check_id_kurs_student = mysqli_fetch_array($check_id_kurs_student);
$check_id_kurs_student = $check_id_kurs_student['id_kurs_student'];

$update_last_page = mysqli_query($connect, "UPDATE `kurs_student` SET last_page = 'resultPage.php' WHERE id_student = '$check_id' and id_kurs = 1");

$check_point = mysqli_query($connect, "SELECT point FROM `kurs_result` WHERE id_kurs_student = '$check_id_kurs_student'");
$check_point = mysqli_fetch_array($check_point);
$check_point = $check_point['point'];

$check_comment_professor = mysqli_query($connect, "SELECT comment_professor FROM `kurs_result` WHERE id_kurs_student = '$check_id_kurs_student'");
$check_comment_professor = mysqli_fetch_array($check_comment_professor);
$check_comment_professor = $check_comment_professor['comment_professor'];

$done_status= mysqli_query($connect, "SELECT status_check FROM `kurs_result` WHERE id_kurs_student = '$check_id_kurs_student'");
$done_status = mysqli_fetch_array($done_status);
$done_status = $done_status['status_check'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Результаты</title>

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
        <h2>Пройдено: 100%</h2>
        <a class="doneLesson" href="videoPage.php">Занятие 1</a>
        <a class="doneLesson" href="articlePage.php">Занятие 2</a>
        <a class="doneLesson" href="testPage.php">Тест</a>
        <a class="doneLesson" href="resultControlWorkPage.php">Итоговая работа</a>
        <a class="thisLesson" href="resultPage.php">Результаты</a>
    </div>

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Результаты</h1>
        <h2 class="result">Получено <?php echo $check_point?> из 100 баллов</h2>
        <h3>Комментарии преподавателя:</h3>
        <p><?php
                echo $check_comment_professor;
            ?></p>
        <a class="lockButton resultButton" href="diploma.php" target="_blank">Ваш диплом</a>
        <script>
            var result_status = "<?php echo $done_status?>"
            let resultButton = document.querySelector(".resultButton")
            if (result_status==="check") {
                resultButton.classList.remove("lockButton")
                resultButton.setAttribute("disabled", false);
            } else {
                resultButton.setAttribute("disabled", true);
            }

        </script>

        <div class="buttonBlock">
            <button class="returnButton" onclick="resultPreview()">Назад</button>
            <button class="nextButton" onclick="resultPageNext()">Завершить курс</button>
        </div>
    </div>
</div>

</body>
</html>
