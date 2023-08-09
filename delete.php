<?php

require_once "./config/db.php";
require_once "./utils/functions.php";
require_once "./store/store.php";

if (isset($_GET['id'])) {
    // print("Id = " . $_GET['id']);
    $id = $_GET['id'];
    $query = "DELETE FROM `users` WHERE `id` = $id";
    $connection -> query($query);
    redirect("./index.php");
    exit;
}