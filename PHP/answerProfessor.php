<?php
session_start();
require_once 'connectBD.php';
$person = $_SESSION['user']['id_person'];

$email = $_POST['emailPerson'];
$text = $_POST['text'];

$check_id = mysqli_query($connect, "SELECT id_from_person FROM `message`, `person` where message.id_from_person = person.id_person and email='$email' and aria='Учебный'");
$check_id = mysqli_fetch_array($check_id);
$check_id = $check_id['id_from_person'];

mysqli_query($connect, "UPDATE `message` SET answer='$text', status='done' WHERE id_from_person = '$check_id' and aria='Учебный'");

header('Location: ../HTML/GeneralProfessor/MessageProfessor.php');