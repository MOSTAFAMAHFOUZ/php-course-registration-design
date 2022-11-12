<?php 


function sessionStore($key,$value){

    $_SESSION[$key] = $value;
}


function sessionGet($key){

    return $_SESSION[$key] ?? [];
}


function removeSession($key){
    if(isset($_SESSION[$key])){
        unset($_SESSION[$key]);
    }
}


