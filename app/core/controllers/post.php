<?php
    class Post{

        public function add_post ($title, $body){

                if(
                    isset($title) && !empty($title)
                    &&
                    isset($body) && !empty($body)
                ){

                    require_once 'app/core/database/models.php';
                    require_once 'app/utils/methods.php';
                    
                     $database = new Model();
                     
                     $table = 'post';
                     $fields = 'title, slug, body, banner, author';
                     $values = '?,?,?,?,?';
                    $slug = generate_slug($title);
                    $banner = file_upload('app/media/', 'banner');
                    $author = $_SESSION['user_info'][0]['id'];

                    

                    $data = array($title, $slug, $body, $banner, $author );
                    $database -> add($table, $fields, $values, $data);
                    echo '<script>alert("Succes")</script>';

                }
                else {
                    echo '<script>alert("Tous les champs sont requis")</script>';
                }

        }


        public function get_all(){

                require_once 'app/core/database/models.php';
                $database = new Model();

                $table = 'post';
                $fields = '*';

                $posts = $database->read($table, $fields);

               while($post=$posts->fetch()){

                
                echo '<a href="post?slug='.$post['slug'].'"> '.$post['title'].'</a> <br>';

               }
        }
    
    }
?>

