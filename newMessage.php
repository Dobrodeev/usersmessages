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
//                $messageQuery = "INSERT INTO messages (id_user, surname, email) VALUES (SELECT id_user, surname, email FROM users WHERE surname='$surname' AND email='$email')";
                // mysqli_num_rows()
                // UPDATE WHERE message IS NULL
//                $res = mysqli_query($connect, $messageQuery);
//                $num = mysqli_num_rows($res);
//                echo 'num_rows = '.$num.'<br>';
//                $resultMessage = 'Новая запись добавлена';
                $queryForInsert = "SELECT id_user, surname, email FROM users WHERE surname='$surname' AND email='$email'";
                $resultInsert = mysqli_query($connect, $queryForInsert);
                $num_rows = mysqli_num_rows($resultInsert);
                echo 'num_rows = '.$num_rows.'<br>';
                $forSelect = mysqli_fetch_array($resultInsert, MYSQLI_ASSOC);
                echo '<pre>';
                print_r($forSelect);
                echo '</pre>';
                $id_user = $forSelect['id_user'];
                $surname = $forSelect['surname'];
                $email = $forSelect['email'];
                $insert = "INSERT INTO messages (id_user, surname, email) VALUES ('$id_user', '$surname', '$email')";
                $ins = mysqli_query($connect, $insert);
                $lastID = mysqli_insert_id($connect);
                echo 'last id: '.$lastID.'<br>';
                $updateQuery = "UPDATE messages SET message='$message' WHERE id_message='$lastID'";
                $updateResult = mysqli_query($connect, $updateQuery);
                $insert_num_rows = mysqli_num_rows($updateResult);
                echo 'insert_num_rows = '.$insert_num_rows.'<br>';

            }


        }


    }
    else
        echo 'Enter your message.<br>';
}
?>

</body>
</html>