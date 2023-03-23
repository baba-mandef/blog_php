<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="public/css/style.css">
    <title>Home</title>
</head>
<body>
      

<?php
    
    require_once 'app/core/controllers/home.php';
    require_once 'app/utils/methods.php';

    if(is_authenticate()){


      echo ' Welcome '.$_SESSION['user_info'][0]['username'].'  to the ambassador blog <br>';  

      echo '<a href="/add-post">Ajouter article</a> <br><br>';
      echo '<a href="/logout">Deconnexion</a>  <br> <br>';

      echo '<hr><br>';

      require_once 'app/core/controllers/post.php';

      $post = new Post();
      $post->get_all();

    }
    else{
        echo ' Welcome to the ambassador blog <br>'; 
        echo '<a href="/login">Connexion</a> <br>';
        echo '<a href="/register">Inscription</a>';

    }
?>
</body>
</html>
