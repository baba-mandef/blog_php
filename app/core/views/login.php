<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Login</title>
</head>
<body>

    <form method="POST">

        <input type="text" placeholder="Username" name="username" id=""> <br> <br>

        <input type="password" placeholder="Password" name="password" id="">   <br> <br>

        
        <input type="submit" value="Login">

    </form>

</body>
</html>

<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once 'app/core/controllers/user.php';
    $user = new User();
    $user -> login($_POST['username'], $_POST['password']);
  }
?>
