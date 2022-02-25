<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);   
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
        echo "Connection to db was successfull";
        echo "<h1>Ok so now for the registration!</h1>";
        echo "$username was succesfully registered <br />";
        echo "hash was: $hashed";
            
        $sql = "INSERT INTO `users` (`Login`,`Pwdhash`) VALUES ('$username','$hashed')";
        echo "<h1>Now we're going to start sql session</h1>";

        /* $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed);
        $stmt->execute(); */
            
        /* $statement = mysqli_prepare($conn, $sql);
        echo "Statement preparation successfull";

        mysqli_stmt_bind_param($statement, "ss", $username, $hashed);
        mysqli_stmt_execute($statement); */
        echo "<h1>Insert in db successfull</h1>";

        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        mysqli_close($conn);
        echo "$user was succesfully registered";
        echo "<h5>You will be redirected soon</h5>";
        $_SESSION["user"] = $username;
        echo '<meta http-equiv="refresh" content="2; URL=index1.html"> ';               
     
        
    ?>
    <br />
</body>
</html>