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

<!--
    <h1>Login, please!</h1>
    <form method="POST" action="check_login.php">
        <h3>Login:</h3>
        <input type="text" placeholder="Enter Username" name="user" /> <br />
        <h3>Password:</h3>
        <input type="password" placeholder="Enter Password" name="pwd" type="password" /> <br />
        <button>Go!</button>
    <form>
-->

<form action="check_login.php" method="post">
  <div class="imgcontainer">
    <img src="images/login.png" width="200px" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <!--<label for="user"><b>Username</b></label>-->
    <input type="text" placeholder="Enter Username" name="user" required> <br />

    <!--<label for="pwd"><b>Password</b></label>-->
    <input type="password" placeholder="Enter Password" name="pwd" required> <br />

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="pwd">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>