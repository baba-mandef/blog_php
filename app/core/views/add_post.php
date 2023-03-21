<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Add new Post</title>
</head>
<body>
      <form action="" enctype="multipart/form-data" method="post">

      <input type="text" name="title" id="" placeholder="Titre"> <br> <br>
        <textarea name="body" id="" cols="30" rows="10" placeholder="Votre article"></textarea><br> <br>
        <label for="banner">Ajoutez une banniere au format jpg/png/JPEG</label><br> 
        <input type="file" name="banner" id="banner"><br> <br>
        <input type="submit" value="Add new post">

      </form>
</body>
</html>

<?php
   

require_once 'app/utils/methods.php';

if(is_authenticate()){


        if($_SERVER['REQUEST_METHOD']=='POST'){

            require_once 'app/core/controllers/post.php';
            $post = new Post();
            $post->add_post($_POST['title'], $_POST['body']);
        }
  

}
else{
   header('location: /login');

}


?>

