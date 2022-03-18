<?php
    //старт сессии
    session_start();
    //проверка, если сессии юзера нет, то не пускает. Если она есть,
    //то есть прошли авторизацию, то сессия есть
    if (!isset($_SESSION["user"])) {
        //требование по переходу на страницу авторизация
        echo '<meta http-equiv="refresh" content="2; URL=login.php"> ';
        //выдача сообщение о необходимости залогиниться
        die("Требуется логин! Вы будете перенаправлены");
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Calculator</title>
        <link rel="stylesheet" href="css/login.css" />
        <!-- <style>
            input {
                margin-bottom: 6px;
                width: 20%;
                text-align: center;
            }
                button {
                margin-bottom: 10px;
                margin-right: 10px;
                width: 5%;
            }
        </style> -->
        <script>
            function plus() {
				//alert("Hello, world!");
				x = parseInt(document.getElementById("txtX").value);
                y = parseInt(document.getElementById("txtY").value);
                url = "api/plus.php?x=" + x + "&y=" + y;
                xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                z = xhr.responseText;
                //z = x + y;
                document.getElementById("txtZ").value = z;
                document.getElementById("plusBut").style.backgroundColor = "#9f4ca1";
                document.getElementById("minusBut").style.backgroundColor = "#04AA6D";
		    }
            function minus() {
				//alert("Hello, world!");
			    x = parseInt(document.getElementById("txtX").value);
                y = parseInt(document.getElementById("txtY").value);
                url = "api/minus.php?x=" + x + "&y=" + y;
                xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                z = xhr.responseText;
                //z = x - y;
                document.getElementById("txtZ").value = z;
                document.getElementById("minusBut").style.backgroundColor = "#9f4ca1";
                document.getElementById("plusBut").style.backgroundColor = "#04AA6D";
		    }
        </script>
    </head>
    <body>
        <a href="index1.html">Home</a>
        <h1>Калькулятор</h1>
        <input id="txtX" type="text" /> <br />
        <input id="txtY" type="text" /> <br />
        <button id="plusBut" onclick="plus();">+</button>
        <button id="minusBut" onclick="minus();">-</button> <br />
        <input id="txtZ" type="text" />
    </body>
</html>