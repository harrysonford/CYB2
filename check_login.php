<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Login</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <?php
        $user = $_REQUEST["user"];
        $pwd = $_REQUEST["pwd"];
        $hash = hash("sha256",$pwd);
        //коннект к базе данных небезопасный
        //$conn = mysqli_connect("localhost:3306", "root", "", "billing");

        //защищенный вход
        include("utils/billing.php");
        $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
        
        //запрос в базе данных пары значений логин и пароль с уязвимостью т.к. оно не параметризовано
        $sql = "SELECT * FROM users WHERE Login='$user' AND Pwdhash='$hash' ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($query);
        
        //ПАРАМЕТРИЗОВАННЫЙ ЗАПРОС
        // $sql = "SELECT * FROM users WHERE Login=? AND Pwdhash=? ";

        // $statement = mysqli_prepare($conn, $sql);//указываем сессию и базу данных
        // mysqli_stmt_bind_param($statement, "ss", $user, $hash);//указываем statement, типы передаваемых данных, параметры
        // //s - string, i - integer
        // $cursor = mysqli_stmt_get_result($statement); //канал взаимодействия между БД и кодом
        // $result = mysqli_fetch_all($cursor); //извлекаем записи из БД

        mysqli_close($conn);
        //var_dump($result);  //передаем данные для анализа, 
        
        //проверяем если длина массива 1 - юзер найден
        //выводит 1 при корректной записи, которая есть в бд, 0 если записи нет, в формате
        //массива массивов
        if (count($result) == 0)
            echo "<h1>The User was not found</h1>";
        else{
            echo "<h1>Welcome, $user!</h1>";
            echo "Сейчас вы будете перенаправлены на калькулятор";
            $_SESSION["user"] = $user;
            echo '<meta http-equiv="refresh" content="2; URL=calc.php"> ';
        }
        

        

        
    ?>
    <br />
    <a href="calc.php">To get business</a> <br />
    <a href="clicks.php">To get clicked</a>
</body>
</html>