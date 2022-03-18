<?php

session_start();
if (!isset($_SESSION["user"])) {
    echo '<meta http-equiv="refresh" content="3; URL=login.php"> ';
    die("Требуется логин");
}
$user = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Твой счёт</title>
    <link rel="stylesheet" href="css/billing.css" />
    <script>
        function toggleTable() {
            if (document.getElementById("tblCalcs").style.display != "none") {
                document.getElementById("tblCalcs").style.display = "none";
                document.getElementById("lnkToggle").innerText = "Показать";
            }
            else {
                document.getElementById("tblCalcs").style.display = "";
                document.getElementById("lnkToggle").innerText = "Спрятать";
            }
        }
    </script>
</head>
<body>
    <a href="index1.html">Home</a>
    <?php
        echo "<h1>Твой счёт, $user!</h1>";
    ?>
    <a onclick="toggleTable();" id="lnkToggle">Hide the table</a>
    <table border="3" id=tblCalcs>
        
    <?php
        include("utils/billing.php");
        $conn = mysqli_connect($db_server, $db_user, $db_pwd, $dbname);
        

        //ПАРАМЕТРИЗОВАННЫЙ ЗАПРОС, вместо переменных - ? (это параметр)
        $sql = "SELECT * FROM calcs where User=?  ";

        $statement = mysqli_prepare($conn, $sql);//указываем сессию и базу данных
        mysqli_stmt_bind_param($statement, "s", $user);//указываем statement, типы передаваемых данных, параметры
        //s - string, i - integer
        mysqli_stmt_execute($statement);
        $cursor = mysqli_stmt_get_result($statement); //канал взаимодействия между БД и кодом
        $result = mysqli_fetch_all($cursor); //извлекаем записи из БД
        mysqli_close($conn);
        echo "<tr>";
        echo("<td>"."ID"."</tb><td>"."First number"."</tb><td>"."Operation"."</tb><td>"."Second number"."</td><td>"."Time stamp"."</td>");
        echo "<tr>";
        for ($i = 0; $i < count($result); ++$i){
            $j = $i + 1;
            //echo("<td>"."ID"."</tb><td>"."First number"."</tb><td>"."Operation"."</tb><td>"."Second number"."</td>");
            echo "<tr>";
            echo("<td>".$j."</tb><td>".$result[$i][1]."</tb><td>".$result[$i][3]."</tb><td>".$result[$i][2]."</td><td>".$result[$i][5]."</td>");
            echo "</tr>";
        }
        
        //var_dump($result); //показать базу данных
    ?>
    </table>
    <?php echo "<h3>Вы должны $i \$</h3>" ?>

</body>
</html>