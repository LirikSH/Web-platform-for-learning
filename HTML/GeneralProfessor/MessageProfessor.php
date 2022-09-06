<?php
session_start();

require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_theme = mysqli_query($connect, "SELECT theme FROM `message` where status = 'none' and aria='Учебный'");
$check_theme = mysqli_fetch_all($check_theme, MYSQLI_ASSOC);

$check_text = mysqli_query($connect, "SELECT text_student FROM `message` where status = 'none' and aria='Учебный'");
$check_text = mysqli_fetch_all($check_text, MYSQLI_ASSOC);

$check_aria = mysqli_query($connect, "SELECT aria FROM `message` where status = 'none' and aria='Учебный'");
$check_aria = mysqli_fetch_all($check_aria, MYSQLI_ASSOC);

$check_email = mysqli_query($connect, "SELECT email FROM `message`, `person` where person.id_person=message.id_from_person and status = 'none'");
$check_email = mysqli_fetch_all($check_email, MYSQLI_ASSOC);

$check_name = mysqli_query($connect, "SELECT full_name FROM `message`, `person` where person.id_person=message.id_from_person and status = 'none'");
$check_name = mysqli_fetch_all($check_name, MYSQLI_ASSOC);

$check_answer_theme = mysqli_query($connect, "SELECT theme FROM `message` where status = 'done' and aria='Технический' and id_from_person='$person'");
$check_answer_theme = mysqli_fetch_all($check_answer_theme, MYSQLI_ASSOC);

$check_answer_text = mysqli_query($connect, "SELECT answer FROM `message` where aria = 'Технический' and id_from_person='$person'");
$check_answer_text = mysqli_fetch_all($check_answer_text, MYSQLI_ASSOC);

$check_file = mysqli_query($connect, "SELECT file from `message` where status='none' and aria='Учебный'");
$check_file= mysqli_fetch_all($check_file, MYSQLI_ASSOC);

$number_answer = count($check_answer_text);
$number = count($check_theme);
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

    <link rel="stylesheet" href="../../CSS/General/MessageProfessor.css">
    <link rel="stylesheet" href="../../CSS/General/MessageStudent.css">
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
    <!--Контент блока-->
    <div class="contentLesson">
        <h1>Мои сообщения</h1>
        <div class="answerBlock">
            <form method="post" action="../../PHP/answerProfessor.php" >
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
</div>

<script src="../../JS/createMessageProfessor.js"></script>
<?php for ($i=0; $i<$number; $i++) {
    ?>
    <script>
        var namePerson = "<?php print($check_name[$i]['full_name'])?>"
        var emailPerson= "<?php print($check_email[$i]['email'])?>"

        var themeTask = "<?php print($check_theme[$i]['theme'])?>"
        var ariaTask= "<?php print($check_aria[$i]['aria'])?>"

        var textStudent = "<?php print($check_text[$i]['text_student'])?>"

        var point = "<?php echo($i)?>"
        createMessageProfessor ()
        createOption()
        formOption = document.querySelectorAll("option")
        formOption[point].setAttribute('value', emailPerson)
        downloades = document.querySelectorAll(".download")

        downloadLink = "../../" + "<?php print($check_file[$i]['file'])?>"
        downloades[point].setAttribute('href', downloadLink)
    </script>
<?php }?>

<script src="../../JS/createMessageProfessorSupport.js"></script>
<?php for ($j=0; $j<$number_answer; $j++) {
    ?>
    <script>
        var answerName = "Поддержка"
        var answerTask = "<?php print($check_answer_theme[$j]['theme'])?>"
        var answerAria= "Технический вопрос"
        var answerText = "<?php print($check_answer_text[$j]['answer'])?>"
        createMessageProfessorSupport ()
    </script>
<?php }?>
</body>
</html>

