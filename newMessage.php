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
        echo '<select name="surname[]" id="" class="form-control">';
        echo '<option disabled hidden selected value="">Your surname</option>';
        while ($all = mysqli_fetch_assoc($query))
        {
            echo '<option>'.$all['surname'].'</option>';
        }
        echo '</select>';
        $queryEmail = 'SELECT email FROM users';
        $allEmails = mysqli_query($connect, $queryEmail);
        echo '<select name="email[]" class="form-control">';
        echo '<option disabled hidden selected value="">Your @email</option>';
        while ($allEmail = mysqli_fetch_assoc($allEmails))
        {
            echo '<option>'.$allEmail['email'].'</option>';
        }
        echo '</select>';
        ?>
        <textarea class="form-control" rows="3" name="message"></textarea><br>
        <input type="submit" name="go" value="send"><br><br>
        <input type="reset" value="Cancel"><br>
    </div>
    <h2><? echo $resultMessage ?></h2>
</form>
<?php
function clearMessage($message)
{
    $m = trim($message);
    $m = htmlspecialchars($message);
    $m = strip_tags($message);
    return $m;
}
if ($_POST['go'])
{
    if ($_POST['message'])
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $message = clearMessage($_POST['message']);
        $surname = implode(',',$_POST['surname']);
        $email = implode(',', $_POST['email']);
        echo 'message: '.$message.' surname: '.$surname.' email: '.$email.'<br>';
        $queryUser = "SELECT * FROM messages WHERE surname ='$surname' AND email='$email' AND message IS NULL";
        $result = mysqli_query($connect, $queryUser);
        $nom = mysqli_num_rows($result);
        if ($nom != 0)
        {
            $messageQuery = "UPDATE messages SET message='$message' WHERE surname = '$surname' AND email = '$email'";
            $insertMessage = mysqli_query($connect, $messageQuery);
            $resultMessage = 'Добавили запись';
        }
        elseif ($num == 0)
        {
            $q = "SELECT * FROM messages WHERE surname='$surname' AND email='$email' AND message IS NOT NULL";
            $result2 = mysqli_query($connect, $q);
            $nom2 = mysqli_num_rows($result2);
            if ($nom2 != 0)
            {
                $messageQuery = "INSERT INTO messages (id_user, surname, email) SELECT id_user, surname, email FROM users WHERE surname=$surname AND email='$email'";
                // mysqli_num_rows()
                // UPDATE WHERE message IS NULL
            }


        }


    }
    else
        echo 'Enter your message.<br>';
}
?>

</body>
</html>