<?php

$current_user_is_logged_in = false;

session_start();

$status = session_status();

if ($status == PHP_SESSION_NONE) {

    //

} else if($status == PHP_SESSION_DISABLED){

    //

} else if($status == PHP_SESSION_ACTIVE){
    
    if (isset($_SESSION['user'])) {
        $current_user_is_logged_in = true;
    }

}

?>