<?php
session_start();

require_once '../../PHP/connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id_professor = mysqli_query($connect, "SELECT id_professor FROM `professor`, `person` where professor.id_person = person.id_person and professor.id_person = '$person'");
$check_id_professor = mysqli_fetch_array($check_id_professor);
$check_id_professor = $check_id_professor['id_professor'];

$check_id_kurs_professor = mysqli_query($connect, "SELECT id_kurs_professor from `kurs_professor` WHERE id_professor = '$check_id_professor' and id_kurs = 1");
$check_id_kurs_professor = mysqli_fetch_array($check_id_kurs_professor);
$check_id_kurs_professor = $check_id_kurs_professor['id_kurs_professor'];

$check_kurs_task = mysqli_query($connect, "SELECT kurs_task from `kurs` WHERE id_kurs = 1");
$check_kurs_task = mysqli_fetch_array($check_kurs_task);
$check_kurs_task = $check_kurs_task['kurs_task'];

$check_id_student = mysqli_query($connect, "SELECT id_kurs_student from `kurs_result` where id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none'");
$check_id_student= mysqli_fetch_all($check_id_student, MYSQLI_ASSOC);

$check_point_student = mysqli_query($connect, "SELECT result_test from `test_student`, `kurs_student`, `kurs_result` where kurs_result.id_kurs_student = kurs_student.id_kurs_student and test_student.id_kurs_student = kurs_student.id_kurs_student and id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none'");
$check_point_student= mysqli_fetch_all($check_point_student, MYSQLI_ASSOC);

$check_comment_student = mysqli_query($connect, "SELECT comment_student from `kurs_result` where id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none'");
$check_comment_student= mysqli_fetch_all($check_comment_student, MYSQLI_ASSOC);

$check_file = mysqli_query($connect, "SELECT file from `kurs_result` where id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none'");
$check_file= mysqli_fetch_all($check_file, MYSQLI_ASSOC);

$check_name_student = mysqli_query($connect, "SELECT full_name FROM `kurs_result`, `kurs_student`, `student`, `person` WHERE kurs_result.id_kurs_student = kurs_student.id_kurs_student AND kurs_student.id_student = student.id_student AND student.id_person = person.id_person AND id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none'");
$check_name_student= mysqli_fetch_all($check_name_student, MYSQLI_ASSOC);

$check_email_student = mysqli_query($connect, "SELECT email FROM `kurs_result`, `kurs_student`, `student`, `person` WHERE kurs_result.id_kurs_student = kurs_student.id_kurs_student AND kurs_student.id_student = student.id_student AND student.id_person = person.id_person AND id_kurs_professor = '$check_id_kurs_professor' and status_done='done' and status_check = 'none' ");
$check_email_student= mysqli_fetch_all($check_email_student, MYSQLI_ASSOC);

$student_number = count($check_name_student);
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

    <link rel="stylesheet" href="../../CSS/professorPage.css">
</head>
<body>
<header>
    <div class="leftHeaderMenu">
        <a href="professorPage.php">
            Главная
        </a>
        <a href="../GeneralProfessor/FAQ.php">
            FAQ
        </a>
        <a href="../GeneralProfessor/Support.php">
            Поддержка
        </a>
        <a href="../GeneralProfessor/Setting.php">
            Настройки
        </a>
        <a href="../GeneralProfessor/MessageProfessor.php">
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
<div class="contentLesson">
<div class="messageBlock">
    <div>
        <h1>Оцените работу</h1>
        <form method="post" action="../../PHP/doneResult.php">
            <label>Кому отправить</label>
            <select name="email" class="formSelect">
            </select>
            <label>Кол-во баллов</label>
            <p><input type="number" max="100" name="resultNumber"><span> из 100</span></p>
            <label>Ваши комментарии к работе</label>
            <textarea placeholder="Текст" name="professorCommit"></textarea>
            <div class="buttonBlock">
                <button type="submit" class="nextButton">Отправить работу</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<script src="../../JS/createWorkMessage.js"></script>
<?php for ($i=0; $i<$student_number; $i++) {?>
<script>
    var nameStudent = "<?php print($check_name_student[$i]['full_name'])?>"
    var emailStudent = "<?php print($check_email_student[$i]['email'])?>"
    var kursTask = "<?php echo $check_kurs_task?>"
    var commentStudent = "<?php print($check_comment_student[$i]['comment_student'])?>"
    var pointProf = "<?php echo($i)?>"
    var pointTest ="<?php print($check_point_student[$i]['result_test'])?>"

    createWorkMessage ()
    createOption()

    formOption = document.querySelectorAll("option")
    downloades = document.querySelectorAll(".download")

    downloadLink = "../../" + "<?php print($check_file[$i]['file'])?>"
    downloades[pointProf].setAttribute('href', downloadLink)
    formOption[pointProf].setAttribute('value', emailStudent)
</script>
<?php }?>
</body>
</html>

