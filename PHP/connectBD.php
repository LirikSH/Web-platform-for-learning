<?php
$connect = mysqli_connect('localhost', 'root', '', 'learning');

if(!$connect)
{
    die('Errors connect to DataBase');
}