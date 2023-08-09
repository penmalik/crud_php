<?php

require_once "../config/db.php";
require_once "../utils/functions.php";
require_once "../store/store.php";

if (isset($_POST['submit'])) {
    // output form inputs, uncomment next two lines
    // print_r($_POST);
    // die();

    // collecting inputs
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $pwd = sanitize($_POST['pwd']);

    // checking if email already exist
    $check_email = check_email($email);
    if($check_email) die("Email already exist!");

    // checking if phone already exist
    $check_phone = check_phone($phone);
    if($check_phone) die("Phone already exist");

    // hash password
    // $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    // insert into database
    $query = insert_user($name, $email, $phone, $pwd);
    if(!$query) die("Error occured!");

    // redirect back to form
    redirect("../create.php");

}

