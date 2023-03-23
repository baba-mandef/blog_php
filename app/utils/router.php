<?php

/**
 * THIS FILE HELPS US TO DISPACTH THE ROUTES AND CALL THE SUITABLE CONTROLLER
 **/
$cleanRoute = explode('?', $_SERVER['REQUEST_URI']);

$route = $cleanRoute[0]; // Get the request URI

if ($route === '/') {
   require_once 'app/core/views/home.php';
}

else if ($route === '/register') {
    require_once 'app/core/views/register.php';
}

else if ($route === '/add-post') {
    require_once 'app/core/views/add_post.php';
}

else if ($route === '/login') {
    require_once 'app/core/views/login.php';
}

else if ($route === '/logout') {
    require_once 'app/core/controllers/user.php';
    $user = new User();
    $user -> logout();
}
else if ($route === '/post') {
    require_once 'app/core/views/post.php';
    
}
else {
    echo '404 vous etes perdue ;(';
}

// author : @ptahemdjehuty
