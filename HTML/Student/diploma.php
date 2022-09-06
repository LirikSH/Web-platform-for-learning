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

$check_kurs = mysqli_query($connect, "SELECT * FROM `kurs_student`, `kurs` where kurs.id_kurs = kurs_student.id_kurs and id_student = '$check_id'");
$kurs= mysqli_fetch_all($check_kurs, MYSQLI_ASSOC);

$check_date_result = mysqli_query($connect, "SELECT date_result FROM `kurs_result` WHERE id_kurs_student = '$check_id_kurs_student'");
$check_date_result = mysqli_fetch_array($check_date_result);
$check_date_result = $check_date_result['date_result'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kirill Zhuravlev">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Диплом</title>

    <link rel="stylesheet" href="../../CSS/header.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">
    <link rel="stylesheet" href="../../CSS/diploma.css">
</head>
<body>
<div class="contentBlock" id="invoice">
        <div class="certificate">
            <h1>Сертификат</h1>
            <h2>от <?php echo $check_date_result?></h2>
        </div>
        <div class="name">
            <p>Настоящим сертификатом утверждается, что студент</p>
            <p><?=$_SESSION['user']['full_name']?></p>
        </div>

    <div>
        <div class="kurs">
            <p>Успешно завершил обучение по курсу:</p>
            <p>«<?php print($kurs[0]['kurs_name'])?>»</p>
        </div>
            <img src="../../Media/Sign.png">
        <div class="sign">
            <p>Генеральный директор</p>
            <p>ООО «Бизнес Генезис»</p>
        </div>

    </div>

</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const element = document.getElementById('invoice');
    var opt = {
        margin:       1,
        filename:     'diploma.pdf',
        image:        { type: 'png', quality: 1}

    }
    html2pdf().set(opt).from(element).save();
</script>
<script>
    function goTo() {
        window.close();
    }
    setTimeout(goTo, 1500)</script>
<?php //header('Location: resultPage.php');?>