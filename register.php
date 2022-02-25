<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <h1>Registration</h1>
    <a href="index1.html">Main page</a> <br />
    <h4>Enter your username and password in the boxes below, please</h4>
    <form method="post" action="do_register.php">
       
        <h3>Username:</h3>
        <input type="text" placeholder="Choose username" name="username" /> <br />
        <h3>Password:</h3>
        <input type="password" placeholder="Choose password" name="password_1" type="password" /> <br />
        <h3>Repeat password:</h3>
        <input type="password" placeholder="Repeat password" name="password_2" type="password" /> <br />
        <button>Register</button>
    </form>    
</body>
</html>