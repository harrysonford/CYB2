<?php

session_start();
$user = $_SESSION["user"];

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

//Здесь имеются существенные нарушения безопасности
// 1. Слабый пароль 
// 2. Нарушение принципа наименьших привилегий
// 3. Секрет в коде
include("../utils/billing.php");
$conn = mysqli_connect($db_server, $db_user, $db_pwd, $dbname);

$currentDateTime = date('Y-m-d H:i:s');
// 4. Уязвимость для SQL Injection
$sql = "INSERT INTO calcs( Number1, Number2, Operation, User, Timestamp) VALUES($x,$y, 'minus', '$user', '$currentDateTime')";
mysqli_query($conn, $sql);



mysqli_close($conn);
$z = $x - $y;
//echo $sql;
echo $z;

