<?php
session_start();

require_once 'connectBD.php';
$person = $_SESSION['user']['id_person'];

$question = $_POST['ariaQuestion'];
$theme = $_POST['theme'];
$text_student = $_POST['textStudent'];
$file = 'Uploads/' . time() . "_" . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], '../' . $file);

mysqli_query($connect, "INSERT INTO `message` (`aria`, `theme`, `text_student`, `id_from_person`) VALUES ('$question', '$theme', '$text_student', '$person')");
mysqli_query($connect,"UPDATE `message` SET file = '$file' WHERE id_from_person = '$person' and status='none'");

header('Location: ../HTML/GeneralProfessor/Support.php');
