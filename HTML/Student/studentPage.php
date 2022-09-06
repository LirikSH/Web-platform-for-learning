<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$check_last_page = mysqli_query($connect, "SELECT last_page FROM `kurs_student`, `kurs` where kurs.id_kurs = kurs_student.id_kurs and id_student = '$check_id'and kurs.id_kurs = '1'");
$check_page = mysqli_fetch_assoc($check_last_page);
$check_page = $check_page['last_page'];

$check_kurs = mysqli_query($connect, "SELECT * FROM `kurs_student`, `kurs` where kurs.id_kurs = kurs_student.id_kurs and id_student = '$check_id'");
$kurs= mysqli_fetch_all($check_kurs, MYSQLI_ASSOC);
$kurs_length = count($kurs);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница студента</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/Student/mainStudentPage.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">
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
        <?=$_SESSION['user']['full_name']?>
         </span>
        <a href="../../PHP/logout.php" class="exit">
            выйти
        </a>
    </div>
</header>
<!--Курсы-->
<div class="mainContent">
    <h1 class="courseTitle">Курсы:</h1>
    <div class="courseCards">
        <!--Карточка курса-->
    </div>
</div>
<script src="../../JS/createCard.js"></script>

<!--Создание карточек-->
<?php
for ($i = 0; $i<$kurs_length; $i++) {
    ?>
    <script>
        var title = "<?php print($kurs[$i]['kurs_name']);?>"
        var description = "<?php print($kurs[$i]['description']);?>"
        var last_page = "<?php echo $check_page?>"
        console.log(last_page)
        createCard()
    </script>
<?php }?>

<!--Добавление картинок и блокирования-->
<script src="../../JS/lockCard.js"></script>
<script src="../../JS/imageCard.js"></script>
<?php for ($i = 0; $i<$kurs_length; $i++) {?>
    <script>
        var lockStatus = "<?php print($kurs[$i]['status']);?>"
        var point = "<?php echo($i)?>"
        lockCard()
        imageCard()
    </script>
<?php }?>

<script src="../../JS/curseButtons.js"></script>
</body>
</html>