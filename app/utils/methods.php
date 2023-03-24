<?php
/**
 * THIS FILE CONTAINS SOME UTILS FUNCTIONS
**/


function search($word)
{ // fonction du moteur de recherche
    // cette fontion prend en paramètre le mot clé de la recherche
    // la recherche se fait en fonction du titre et de la description
    $query = preg_replace("#[^a-zA-Z ?0-9]#i", "", $word); // nettoyage du mot clé
    $sql = "SELECT * FROM plans WHERE name LIKE ? OR description LIKE ? OR ville LIKE ?"; // requete de reherche
    require('connect_db.php'); // récupération de l'objet de connection à la base de données 
    $req = $db -> prepare($sql); 
    $req -> execute(array('%'.$query.'%', '%'.$query.'%', '%'.$query.'%')); // execution de la requete de recherche
    return $req;
}

// upload and return the uploaded file link
function file_upload($dir, $file)
{
    
    // Check if the file is well loaded
    if ($_FILES[$file]['name']) {
   
        // Check if the file do not contains errors
        if (!$_FILES[$file]['error']) {
         

            $temp_name = $_FILES[$file]['tmp_name']; // get the temp file name
            $type = $_FILES[$file]['type']; // get the file type
         
             // Check the file extensions 
             $typeList = array('png', 'jpg', 'jpeg');
             $clean_type = explode('/', $type);

            
            if (in_array($clean_type[1] ,$typeList)) {
               
               
              
                $name = $_FILES[$file]['name']; // get the real file name
                $urlf = $dir . $name; 
                move_uploaded_file($temp_name, $dir . $name); // upload the file
                return $urlf;
                
            } else {
                echo "<script>alert(\"Error ! Wrong file format ! Try Again\")</script>";
                exit();
            }
        }
    }
   
}

function authenticate($data){
    session_start();
    $_SESSION['user_info'] = $data;
}

function is_authenticate(){
    session_start();
    if(isset($_SESSION['user_info'] )){
        return true;
    }
    else{
        return false;
    }
}

function generate_slug($urlString)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
    return $slug;
}


// author : @ptahemdjehuty
?>

