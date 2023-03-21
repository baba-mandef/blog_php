<?php

class User
{

    public function register($username, $password, $confirmPassword)
    {

        if (
            isset($username) && !empty($username)
            &&
            isset($password) && !empty($password)
            &&
            isset($confirmPassword) && !empty($confirmPassword)
        ) {

            if (
                $password === $confirmPassword
            ) {
                require_once 'app/core/database/models.php';

                $database = new Model();
                $table = 'user';
                $fields = 'username, password';
                $values = '?,?';
                $data = array($username, sha1($password));

                $database->add($table, $fields, $values, $data);

                echo '<script>alert("Votre compte a été crée avec succes")</script>';
            } else {
                echo '<script>alert("Erreur ! Les mots de passe doivent être identiques ")</script>';
            }
        } else {
            echo '<script>alert("Erreur ! Tous les champs sont requis")</script>';
        }
    }

    public function login($username, $password)
    {

        if (
            isset($username) && !empty($username)
            &&
            isset($password) && !empty($password)
        ) {

            require_once 'app/core/database/models.php';
            $database = new Model();
            $table = 'user';
            $fields = 'id, password';
            $sfield = 'username';
            $data = array($username);

            $query = $database->read_filter_once($table, $fields, $sfield, $data);
            $pass =  $query->fetch();


            if ($pass) {


                if ($pass['password'] == sha1($password)) {
                    
                    require_once 'app/utils/methods.php';
                    $info = array(['username'=>$username, 'id'=>$pass['id']]);
                    authenticate($info);

                    var_dump($_SESSION['user_info']);
                    echo '<script>alert("Bienvenue")</script>';
                    header('location: /');

                }

                else {
                    echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect")</script>';
                }

            } 
            else {
                echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect")</script>';
            }
        }
    }

    public function logout(){
        session_start(); // demarrer la session
        session_destroy(); // supprimer les informations en session
        session_abort(); 
        header('location : /login');
    }
}
