<?php

session_start();
$user = $_SESSION["user"];

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

//Здесь имеются существенные нарушения безопасности
// 1. Слабый пароль 
// 2. Нарушение принципа наименьших привилегий
// 3. Секрет в коде
//$conn = mysqli_connect("localhost:3306", "root", "", "billing");

//включаем один файл в состав другого

include("../utils/billing.php");
$conn = mysqli_connect($db_server, $db_user, $db_pwd, $dbname);


$currentDateTime = date('Y-m-d H:i:s');
//echo $currentDateTime;
// 4. Уязвимость для SQL Injection
$sql = "INSERT INTO calcs( Number1, Number2, Operation, User, Timestamp ) VALUES($x,$y, 'plus', '$user', '$currentDateTime')";
mysqli_query($conn, $sql);



mysqli_close($conn);
$z = $x + $y;
//echo $sql;
echo $z;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $db = new mysqli($db_server, $db_user, $db_pwd, $dbname);
        $db->set_charset($charset);
        $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    } catch (\mysqli_sql_exception $e) {
         throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
    }
    unset($db_server, $dbname, $db_user, $db_pwd, $charset);