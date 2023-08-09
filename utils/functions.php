<?php

// sanitizing form inputs to avoid unwanted database injection
function sanitize($input){
    global $connection;
    return mysqli_real_escape_string($connection, htmlspecialchars(trim($input)));
}

// redirect from one page to another
function redirect($url, $refresh = NULL){
    if($refresh) return header("Refresh = $refresh, url = $url");
    return header("Location: $url");
}