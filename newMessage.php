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
<form action="#" method="post" name="message" class="form-horizontal">
    <div class="form-group">
        <?php
        $querySurname = "SELECT DISTINCT surname FROM users";
        $query = mysqli_query($connect, $querySurname);
        $num = mysqli_num_rows($query);
        echo '<select name="surname[]" id="" class="form-control">';
        echo '<option disabled hidden selected value="">Your surname</option>';

        echo '</select>';
        ?>
        <input type="text" placeholder="Your message" name="message" class="form-control"><br>
        <input type="submit" name="send" value="send"><br>
    </div>
</form>


</body>
</html>