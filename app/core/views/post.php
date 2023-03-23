<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $slug = $_GET['slug'];
        require_once 'app/core/controllers/post.php';

    $post = new Post();
    $payload = $post -> details($slug);

    echo'
    <div>
<h3>'.$payload['title'].'</h3>
    <img src="'.$payload['banner'].'" alt="">
    <p> '.$payload['body'].'</p>
    
</div>';

    ?>

    <form action="" method="POST">
        <label for="comment">Ajouter un commentaire</label> <br>
        <textarea name="comment" id="comment" placeholder="Saisissez votre commentaire" cols="30" rows="10"></textarea>
        <input type="submit" value="ajouter">
    </form>

    <?php

            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    session_start();
                    $body = $_POST['comment'];
                    $author = $_SESSION['user_info'][0]['id'];
                    $post_id = $payload['id'];

                    $post -> add_comment($body, $author, $post_id);

                }
    ?>
    
</body>
</html>


