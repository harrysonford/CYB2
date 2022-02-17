<?php

session_start();
$user = $_SESSION["user"];

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

//Здесь имеются существенные нарушения безопасности
// 1. Слабый пароль 
// 2. Нарушение принципа наименьших привилегий
// 3. Секрет в коде
$conn = mysqli_connect("localhost:3306", "root", "", "billing");


// 4. Уязвимость для SQL Injection
$sql = "INSERT INTO calcs( Number1, Number2, Operation, User) VALUES($x,$y, 'minus', '$user')";
mysqli_query($conn, $sql);



mysqli_close($conn);
$z = $x - $y;
//echo $sql;
echo $z;

