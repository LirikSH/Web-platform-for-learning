<?php
session_start();

require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_from_person from `message` where status='none' and aria='Технический'");
$check_id= mysqli_fetch_all($check_id, MYSQLI_ASSOC);

$check_comment_student = mysqli_query($connect, "SELECT text_student from `message` where status='none' and aria='Технический'");
$check_comment_student= mysqli_fetch_all($check_comment_student, MYSQLI_ASSOC);

$check_theme = mysqli_query($connect, "SELECT theme from `message` where status='none' and aria='Технический'");
$check_theme= mysqli_fetch_all($check_theme, MYSQLI_ASSOC);

$check_name = mysqli_query($connect, "SELECT full_name from `person`, `message` where id_person=id_from_person and status='none' and aria='Технический'");
$check_name= mysqli_fetch_all($check_name, MYSQLI_ASSOC);

$check_email = mysqli_query($connect, "SELECT email from `person`, `message` where id_person=id_from_person and status='none' and aria='Технический'");
$check_email= mysqli_fetch_all($check_email, MYSQLI_ASSOC);

$check_file = mysqli_query($connect, "SELECT file from `message` where status='none' and aria='Технический'");
$check_file= mysqli_fetch_all($check_file, MYSQLI_ASSOC);

$person_number = count($check_id);
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
    <link rel="stylesheet" href="../../CSS/General/MessageProfessor.css">
    <link rel="stylesheet" href="../../CSS/adminPage.css">
</head>
<body>
<header>
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
        <div class="answerBlock">
            <form method="post" action="../../PHP/answerAdmin.php" >
                <h2>Ответьте на сообщения</h2>
                <label>Кому:</label>
                <select name="emailPerson" class="formSelect">
                </select>
                <textarea placeholder="Текст" name="text"></textarea>
                <div class="buttonBlock">
                    <button class="resultButton" type="submit">Отправить сообщение</button>
                </div>
            </form>
        </div>
</div>
    <script src="../../JS/createAdminMessage.js"></script>
    <?php for ($i=0; $i<$person_number; $i++) {?>
    <script>
        var nameStudent = "<?php print($check_name[$i]['full_name'])?>"
        var emailStudent = "<?php print($check_email[$i]['email'])?>"
        var kursTheme = "<?php print($check_theme[$i]['theme'])?>"
        var commentStudent = "<?php print($check_comment_student[$i]['text_student'])?>"
        var point = "<?php echo($i)?>"

        createAdminMessage ()
        createOption()

        formOption = document.querySelectorAll("option")
        formOption[point].setAttribute('value', emailStudent)

        downloades = document.querySelectorAll(".download")
        downloadLink = "../../" + "<?php print($check_file[$i]['file'])?>"
        downloades[point].setAttribute('href', downloadLink)
    </script>
    <?php }?>
</body>
</html>

