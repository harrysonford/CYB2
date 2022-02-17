<html>
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <a href="index1.html">Home</a>
        <h1>Привет от php</h1>
        <?php
            $x = 2;
            $y = 2;
            $z = $x + $y;
            echo "Результат вычисления = $z";
            date_default_timezone_set('Europe/Moscow');
            $now = date("H:i:s");
            echo "<h2>Текущаее время: $now</h2>";
        ?>
    </body>
</html>