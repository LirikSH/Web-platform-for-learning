<?php
session_start();
require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_theme = mysqli_query($connect, "SELECT theme FROM `message` where id_from_person='$person'");
$check_theme = mysqli_fetch_all($check_theme, MYSQLI_ASSOC);

$check_answer = mysqli_query($connect, "SELECT answer FROM `message` where id_from_person='$person'");
$check_answer = mysqli_fetch_all($check_answer, MYSQLI_ASSOC);

$number = count($check_answer);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сообщения</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">

    <link rel="stylesheet" href="../../CSS/General/MessageStudent.css">
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

    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Мои сообщения</h1>
        <div id="contentLesson"></div>
    </div>

    <script src="../../JS/createMessage.js"></script>
    <?php for ($i=0; $i<$number; $i++) {?>
    <script>
        var themeTask = "<?php print($check_theme[$i]['theme'])?>"
        var commentTask= "<?php print($check_answer[$i]['answer'])?>"
        var point = "<?php echo($i)?>"
        createMessage ()
    </script>
        <?php }?>
</div>
</body>
</html>

