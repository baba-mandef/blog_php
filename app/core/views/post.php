<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
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
        <input type="submit" name='send_comment' value="ajouter">
    </form>

    <?php

            if(isset($_POST['send_comment']))
                {
                   
                    $body = $_POST['comment'];
                    $author = $_SESSION['user_info'][0]['id'];
                    $post_id = $payload['id'];

                    $post -> add_comment($body, $author, $post_id);

                }
            
                $is_liked = $post -> check_like($payload['id'],  $_SESSION['user_info'][0]['id'])

    ?>

                <hr>
                    <form action="" method="POST">
                        <button type="submit" name="like"> <?php
                            

                           
                         if($is_liked==false){
                                echo '<i class="fa-regular fa-heart"></i>';
                         }
                         else{
                            echo ' <i class="fa fa-heart"></i>';
                         }
                         
                        if(isset($_POST['like']))
                        {
                            $post->like_post($payload['id'], $_SESSION['user_info'][0]['id'], $is_liked);
                        }

                         ?> </button>
                    </form>
                <hr>

                <h3>Section commentaires</h3>

                <hr>

                <?php

                    $comments = $post -> get_comment($payload['id']);
             

                    while($comment=$comments->fetch()){

                        $user = $post -> get_comment_author($comment['author']);

                        $author_name = $user->fetch();

                        echo '
                        

                                <h4>'.$author_name['username'].' </h4>
                                <p>'.$comment['body'].'</p>


                                <button onclick="display_form('.$comment['id'].')" >Repondre</button>

                                <form action="" id="'.$comment['id'].'" method="POST" hidden>
                
                                    <label for="reply">Repondre</label> <br>
                                    <textarea name="reply" id="reply" placeholder="saisissez votre reponse" cols="30" rows="10"></textarea> <br>
                                   
                                    <input type="text" hidden name="parent" value="'.$comment['id'].'">
                                   
                                    <input type="submit" name="_reply" value="Envoyer"> 
                                </form>
                
                                <hr>
                              

                        ';

                        $replies = $post -> get_replies($payload['id'], $comment['id']);

                        while($reply = $replies->fetch()){

                            $_user = $post -> get_comment_author($reply['author']);

                            $_author_name = $_user->fetch();

                            echo '
                            
                           <div style="margin-left:50px">
                           <h4>'.$_author_name['username'].' </h4>
                           <p>'.$reply['body'].'</p>
                           <hr>
                           </div>
                            
                            ';

                        }

                      
                    }

                    if(isset($_POST['_reply']))

                    {
                        $post -> reply_to_comment($_POST['reply'], $_SESSION['user_info'][0]['id'], $payload['id'], $_POST['parent']);
                    }



                ?>

               

    <script src="/public/js/main.js"></script>
</body>
</html>


