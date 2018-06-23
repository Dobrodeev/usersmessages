<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="bootstrap4/jquery-3.3.1.js"></script>
<script src="bootstrap4/js/bootstrap.min.js"></script>
<?php
require_once 'connectDB.php';
$q = 'SELECT surname FROM users RIGHT OUTER JOIN messages ON users.id_user = messages.id_user';
$all = mysqli_query($connect, $q);
$all_message = mysqli_fetch_array($all, MYSQLI_ASSOC);
?>
</body>
</html>