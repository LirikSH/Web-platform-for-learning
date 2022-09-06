<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];
$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$update_last_page = mysqli_query($connect, "UPDATE `kurs_student` SET last_page = 'articlePage.php' WHERE id_student = '$check_id' and id_kurs = 1");
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Kirill Zhuravlev">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Статья</title>

        <link rel="stylesheet" href="../../CSS/header.css">
        <link rel="stylesheet" href="../../CSS/main.css">
        <link rel="stylesheet" href="../../CSS/fonts.css">

        <link rel="stylesheet" href="../../CSS/Student/articlePage.css">

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
            <h2>Пройдено: 25%</h2>
            <a class="doneLesson" href="videoPage.php">Занятие 1</a>
            <a class="thisLesson" href="articlePage.php">Занятие 2</a>
            <a href="testPage.php">Тест</a>
            <a href="resultControlWorkPage.php">Итоговая работа</a>
            <a href="resultPage.php">Результаты</a>
        </div>
        <!--Контент блока-->
        <div class="contentLesson">
            <h1>Статья на тему: «Информационные технологии»</h1>
            <p>Информационные технологии — это процесс создания, хранения, передачи, восприятия информации и методы реализации таких процессов.</p>
            <p>Большинство людей приравнивают понятие к компьютерным технологиям, потому что с их помощью ИТ стали развиваться быстрее. </p>
            <p>Несмотря на то, что концепция информационных технологий считается тождественным понятиям компьютер (это что?) и компьютерная сеть, использование концепции IT саму по себе нельзя ограничивать только компьютерами.</p>
            <div class="imageBlock">
                <div class="image image-1"></div>
                <span>График развития и восприятия технологий</span>
            </div>
            <h2>Отрасль информационных технологий</h2>
            <p>Информационные технологии занимаются созданием, разработкой и управлением информационными системами. ИТ предназначены для решения задач, связанных с эффективной организацией информационных процессов на основе современных достижений в области компьютерных технологий и других высокотехнологичных процессов, новых средств связи, программных средств и опыта практического применения. ИТ также помогает найти решения задач, связанных с эффективной организацией информационных процессов с целью снижения расходов на время, труд, энергию и материальные ресурсы во всех областях жизни. Информационные технологии взаимодействуют и чаще всего являются составляющими частями сфер услуг, управления, производственного, социального процессов.</p>
            <h2>Устаревание информационной технологии</h2>
            <p>Внедрение новых информационных технологий в организации сопровождается риском потерь из-за неизбежного их устаревания со временем, поскольку информационные технологии, как и другие материальные товары, обладают чрезвычайной скоростью изменения, появления новых видов или версий. Период смены колеблется от одного месяца до года. Если при внедрении новой информационной технологии этому фактору не уделяется должного внимания, может быть, к моменту окончания перевода компании на новую информационную технологию она уже устареет, нужно будет предпринимать меры по ее обновлению. Такие неудачи внедрения информационных технологий, как правило, связаны с недостатком технических средств, а главная причина неудач – отсутствие и слабая проработка методологии применения информационных технологий.</p>
            <div class="buttonBlock">
                <button class="returnButton" onclick="articlePreview()">Назад</button>
                <button class="nextButton" onclick="articleNext()">Далее</button>
            </div>
        </div>
    </div>
    </body>
    </html>

