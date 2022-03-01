<?php

    session_start();
    if (!isset($_SESSION["user"])) {
        echo '<meta http-equiv="refresh" content="3; URL=../login.php"> ';
        die("Требуется логин");
    }
    $user = $_SESSION["user"];

    include("../utils/billing.php");
    $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
        

    //ПАРАМЕТРИЗОВАННЫЙ ЗАПРОС, вместо переменных - ? (это параметр)
    $sql = "SELECT * FROM calcs where User=?  ";

    $statement = mysqli_prepare($conn, $sql);//указываем сессию и базу данных
    mysqli_stmt_bind_param($statement, "s", $user);//указываем statement, типы передаваемых данных, параметры
    //s - string, i - integer
    mysqli_stmt_execute($statement);
    $cursor = mysqli_stmt_get_result($statement); //канал взаимодействия между БД и кодом
    $result = mysqli_fetch_all($cursor); //извлекаем записи из БД
    mysqli_close($conn);
    
    //Генерируем JSON из данных биллинга (переменной $result)
    echo json_encode($result);
        

