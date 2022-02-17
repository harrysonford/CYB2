<!--подключение к контексту сессиий для работы с памятью сессии-->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clicks</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
<a href="index1.html">Home</a>

<form>
  <div class="imgcontainer">
    <img src="images/cookie.png" width="100px" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    
    <button>BUMP IT</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>


<!--
    <h1>Count clicks on php</h1>
    <form>
        <button type="button">BUMP IT</button>
    </form>
-->
    <?php
        //$i=0;
        //isset - проверяет задано ли что-то, например сессии $_SESSION["clicks"]
        //if (isset($_SESSION["clicks"]))
            //если есть, задаем значение
        //    $i = $_SESSION["clicks"];
        //else
            //если нет, то значение 0
        //    $i = 0;
        //код, позволяет запоминать куки кликс
        if (isset($_COOKIE["clicks"]))
            $i = $_COOKIE["clicks"];
        else
            $i = 0;
        
        $i += 1;
        echo "Mouse count: $i";

        //Код, который запоминает куки
        setcookie("clicks", $i, time() + 20)

        //запоминаем переменную в сессии
        //$_SESSION["clicks"] = $i;
    ?>

</body>
</html>