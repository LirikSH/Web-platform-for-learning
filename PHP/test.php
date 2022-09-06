<?php
session_start();
require_once 'connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$update_last_page = mysqli_query($connect, "UPDATE `kurs_student` SET last_page = 'testPage.php' WHERE id_student = '$check_id' and id_kurs = 1");

$check_id_kurs_student = mysqli_query($connect, "SELECT id_kurs_student from `kurs_student` WHERE id_student = '$check_id' and id_kurs = 1");
$check_id_kurs_student = mysqli_fetch_array($check_id_kurs_student);
$check_id_kurs_student = $check_id_kurs_student['id_kurs_student'];

$answer1 = $_POST['Answer1'];
$answer2 = $_POST['Answer2'];
$answer3 = $_POST['Answer3'];
$answer4 = $_POST['Answer4'];
$answer5 = $_POST['Answer5'];
$result = 0;

//Вопрос 1
if ($answer1 == 'Информационная система' or $answer1 == 'информационная система' or $answer1 == 'ИС' or $answer1 == 'ис' or $answer1 == 'Информационная' or $answer1 == 'информационная') {
    $result = $result + 1;
}

//Вопрос 2
if ($answer2 == [1, 3, 4, 6]) {
    $result = $result + 1;
}

//Вопрос 3
for ($i=0; $i<2; $i++) {
    if ($answer3[$i] == 2) {
        $result = $result + 1;
    }
}

//Вопрос 4
for ($i=0; $i<2; $i++) {
    if ($answer4[$i] == 3) {
        $result = $result + 1;
    }
}

//Вопрос 5
if ($answer5 == [1, 3]) {
    $result = $result + 1;
}

$result = round(($result/5)*100);

$update_testResult = mysqli_query($connect, "UPDATE `test_student` SET result_test = '$result' WHERE id_kurs_student = '$check_id_kurs_student'");

$_SESSION['test']="Тест проверен";
header('Location: ../HTML/Student/testPage.php');