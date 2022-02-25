<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration confirmed</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <?php
        $username = $_REQUEST["username"];
        $password_1 = $_REQUEST["password_1"];
        $password_2 = $_REQUEST["password_2"];

        $hashed = hash("sha256",$password_1);
        
        //защищенный вход в базу данных
        include("utils/billing.php");
        $conn = mysqli_connect($db_server, $db_user, $db_pwd, $dbname);
                       
        $checkLogin = "SELECT * FROM users WHERE Login=?  ";

        $statement = mysqli_prepare($conn, $checkLogin);//указываем сессию и базу данных
        mysqli_stmt_bind_param($statement, "s", $username);//указываем statement, типы передаваемых данных, параметры
        //s - string, i - integer
        mysqli_stmt_execute($statement);
        $cursor = mysqli_stmt_get_result($statement); //канал взаимодействия между БД и кодом
        $result = mysqli_fetch_all($cursor); //извлекаем записи из БД
        mysqli_close($conn);
        
        //проверяем если длина массива 1 - юзер найден
        //выводит 1 при корректной записи, которая есть в бд, 0 если записи нет, в формате
        //массива массивов
        if (count($result) == 0){ //если пользователь не найден в бд
            $conn = mysqli_connect($db_server, $db_user, $db_pwd, $dbname);
            $sql = "INSERT INTO users (Login,Pwdhash) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashed);
            $stmt->execute();
            mysqli_close($conn);
            echo "<h3>$username was succesfully registered</h3>";
            echo "<h5>You will be redirected soon</h5>";
            $_SESSION["user"] = $username;
            echo '<meta http-equiv="refresh" content="2; URL=index1.html"> ';
        } elseif ($password_1 != $password_2) {
            echo "<h1>Sorry!</h1>";
            echo "The password doesn't match, enter the correct passwords";
            echo '<meta http-equiv="refresh" content="3; URL=register.php"> ';
        }  else {
            echo "<h1>Sorry!</h1>";
            echo "Username is busy, please choose another one";
            echo '<meta http-equiv="refresh" content="3; URL=register.php"> ';
        }
        
    ?>
    <br />
</body>
</html>