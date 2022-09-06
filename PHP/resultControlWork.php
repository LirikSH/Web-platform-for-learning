<?php
session_start();
require_once 'connectBD.php';
$person = $_SESSION['user']['id_person'];

$check_id = mysqli_query($connect, "SELECT id_student FROM `student`, `person` where student.id_person = person.id_person and student.id_person = '$person'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_student'];

$check_id_kurs_student = mysqli_query($connect, "SELECT id_kurs_student from `kurs_student` WHERE id_student = '$check_id' and id_kurs = 1");
$check_id_kurs_student = mysqli_fetch_array($check_id_kurs_student);
$check_id_kurs_student = $check_id_kurs_student['id_kurs_student'];

$comment_student = $_POST['comment'];
$file = 'Uploads/' . time() . "_" . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], '../' . $file);

$update_comment_student = mysqli_query($connect,"UPDATE `kurs_result` SET comment_student = '$comment_student' WHERE id_kurs_student = '$check_id_kurs_student'");
$update_comment_file = mysqli_query($connect,"UPDATE `kurs_result` SET file = '$file' WHERE id_kurs_student = '$check_id_kurs_student'");
$update_status_done = mysqli_query($connect,"UPDATE `kurs_result` SET status_done = 'done' WHERE id_kurs_student = '$check_id_kurs_student'");

$_SESSION['work'] = 'Работа отправлена';

header('Location: ../HTML/Student/resultControlWorkPage.php');