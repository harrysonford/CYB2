<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <h1>Login, please!</h1>
    <h4>Don't have an account?</h4>
    <a href="register.php">Register</a> <br /> <br />
    <form method="post" action="check_login.php">
        <!--<h3>Login:</h3>-->
        <input type="text" placeholder="Enter Username" name="user" />
        <!--<h3>Password:</h3>-->
        <input type="password" placeholder="Enter Password" name="pwd" type="password" /> <br />
        <button>Enter</button>
    <form>
</body>
</html>