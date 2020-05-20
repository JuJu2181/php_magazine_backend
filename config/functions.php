<?php
function debugger($data,$is_die = false){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if(is_die){
        exit();
    }
}

function sanitize($str){
    return trim(stripcslashes(strip_tags($str)));
}

function tokenize($length = 100){
    $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
}
?>