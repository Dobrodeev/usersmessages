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
require_once 'ConnectDB.php';
?>
<form action="#" method="post" name="auto" class="form-horizontal">
    <div class="form-group">
    <input type="text" placeholder="Your name" name="name" class="form-control"><br>
    <input type="text" placeholder="Your surname" name="surname" class="form-control"><br>
    <input type="submit" name="go" value="autorization"><br>
    </div>
</form>

<?php

if (isset($_POST['go'])) {
    if ($_POST['name'] && $_POST['surname']) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $queryAuto = "SELECT * FROM users WHERE name = '$name' AND surname = '$surname'";
        $query = mysqli_query($connect, $queryAuto);
        $num = mysqli_num_rows($query);
        echo 'Выведем mysqli_num_rows(): <br>';
        print_r($num) . '<br>';
        echo '<br>';
        if ($num != 0) {
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            echo 'Выведем mysqli_fetch_array():<br>';
            echo '<pre/>';
            print_r($result);
            echo '</pre>';
            echo '<br>';
            echo 'Your id: '.$result['id_user'].'<br>';
            $id_user = $result['id_user'];
            if ($name == $result['name'] && $surname == $result['surname']) {
                echo '<a href="newMessage.php">Add message</a>';
            } else {
                echo 'Логин или пароль не верен';
            }
        } else {
            echo 'Заполните пустые значения';
        }
    }
}
?>
<!--<input type="hidden" name="id" value="--><?// $id_user?><!--">-->
</body>
</html>
