<?php
$login = 'root';
$password = '';
$localhost = 'localhost';
$db = 'usersAndMessages';
$connect = mysqli_connect($localhost, $login, $password, $db);
if (!$connect)
{
    die('Error');
}