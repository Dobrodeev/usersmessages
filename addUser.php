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
<form action="#" method="post" name="reg" class="form-horizontal">
    <div class="form-group">
        <input type="text" placeholder="name" name="name" class="form-control"><br>
        <input type="text" placeholder="surname" name="surname" class="form-control"><br>
        <input type="text" placeholder="email" name="email" class="form-control"><br>
        <input type="text" placeholder="phone" name="phone" class="form-control"><?php echo $error[0]?><br>
        <input type="submit" name="go" value="Add" class="btn btn-default"><br>
    </div>
</form>
<!--<h4>--><?php //echo $result?><!--</h4>-->
<!--<h4>--><?php //echo $login?><!--</h4>-->
<?php
function clear($text)
{
    $text = trim($text);
    $text = htmlspecialchars($text);
    $text = stripcslashes($text);
    $text = strip_tags($text);
    return $text;
}
if (isset($_POST['go']))
{
    if ($_POST['name'] && $_POST['surname'] && $_POST['email'] && $_POST['phone'])
    {
        $name = htmlentities(mysqli_real_escape_string($connect, clear($_POST['name'])));
        $surname = htmlentities(mysqli_real_escape_string($connect, clear($_POST['surname'])));
        $email = htmlentities(mysqli_real_escape_string($connect, clear($_POST['email'])));
        $phone = htmlentities(mysqli_real_escape_string($connect, clear($_POST['phone'])));
        if (!preg_match("|^([0-9]{10})|is", $phone))
        {
            $error[0] = 'style="background-color: #cc4c33";';
        }
        $queryIf = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($connect, $queryIf);
        $num = mysqli_num_rows($query);
        if ($num == 0 && ($error[0]) == '')
        {
            $query2 = "INSERT INTO users (name, surname, email, phone) VALUES ('{$name}', '{$surname}', '{$email}','{$phone}')";
            $insert = mysqli_query($connect, $query2);
            $lastID = mysqli_insert_id($connect);
            $insertQueryMessage = "INSERT INTO messages (id_user, surname, email) VALUES ('$lastID', '$surname', '$email')";
            $insertQueryResult = mysqli_query($connect, $insertQueryMessage);
            $result = 'Все успешно';
            $login = '<a href="addMessage.php"> Написать message </a>';
        }
        elseif ($error != '')
        {
            $result = 'Введите корректный номер';
        }
        else
        {
            $result = 'Номер уже существует';
        }
    }
    else
        $result = 'Заполните пустые строки';
}
?>
<h4><?php echo $result?></h4>
<a href="index.php">На главную</a>
<!--<h4>--><?php //echo $login?><!--</h4>-->
</body>
</html>