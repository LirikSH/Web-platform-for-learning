<?php
session_start();

require_once 'connectBD.php';

$person = $_SESSION['user']['id_person'];

$check_id_professor = mysqli_query($connect, "SELECT id_professor FROM `professor`, `person` where professor.id_person = person.id_person and professor.id_person = '$person'");
$check_id_professor = mysqli_fetch_array($check_id_professor);
$check_id_professor = $check_id_professor['id_professor'];

$check_id_kurs_professor = mysqli_query($connect, "SELECT id_kurs_professor from `kurs_professor` WHERE id_professor = '$check_id_professor' and id_kurs = 1");
$check_id_kurs_professor = mysqli_fetch_array($check_id_kurs_professor);
$check_id_kurs_professor = $check_id_kurs_professor['id_kurs_professor'];

$email = $_POST['email'];
$resultNumber = $_POST['resultNumber'];
$professorCommit = $_POST['professorCommit'];

$today = date("y.m.d");

$check_id_kurs_student = mysqli_query($connect, "SELECT kurs_result.id_kurs_student as id_kurs_student FROM `kurs_result`, `kurs_student`, `student`, `person` WHERE kurs_result.id_kurs_student = kurs_student.id_kurs_student AND kurs_student.id_student = student.id_student AND student.id_person = person.id_person AND id_kurs_professor = '$check_id_kurs_professor' and email='$email' ");
$check_id_kurs_student = mysqli_fetch_array($check_id_kurs_student);
$check_id_kurs_student = $check_id_kurs_student['id_kurs_student'];

$update_status_point = mysqli_query($connect,"UPDATE `kurs_result` SET point = '$resultNumber' WHERE id_kurs_student = '$check_id_kurs_student'");
$update_professorCommit = mysqli_query($connect,"UPDATE `kurs_result` SET comment_professor = '$professorCommit' WHERE id_kurs_student = '$check_id_kurs_student'");
$update_status_check = mysqli_query($connect,"UPDATE `kurs_result` SET status_check = 'check' WHERE id_kurs_student = '$check_id_kurs_student'");
$update_date_done = mysqli_query($connect,"UPDATE `kurs_result` SET date_result = '$today' WHERE id_kurs_student = '$check_id_kurs_student'");


header('Location: ../HTML/Professor/professorPage.php');