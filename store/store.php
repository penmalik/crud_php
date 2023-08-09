<?php

function get_user(){
    global $connection;
    $sql = "SELECT * FROM `users` ";
    $result = $connection->query($sql);

    if(!$result) die("Error occured!");
    return $result;
}

function get_user_id($id){
    global $connection;
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = $connection->query($sql);
    $row = $result -> fetch_assoc();
    return $row;
}

function check_email($email){
    global $connection;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $connection->query($sql);

    if($result->num_rows > 0) {
        return true; // Email exists
    }
    
    return false; // Email doesn't exist
}

function check_phone($phone){
    global $connection;
    $sql = "SELECT * FROM `users` WHERE `phone` = '$phone'";
    $result = $connection->query($sql);

    if($result->num_rows > 0) {
        return true; // Phone exists
    }
    
    return false; // Phone doesn't exist
}

function insert_user($name, $email, $phone, $password){
    global $connection;
    $sql = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
    $result = $connection->query($sql);
    return $result;
}