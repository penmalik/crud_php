<?php

define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "crud");

$connection = new mysqli(SERVER, USER, PASSWORD, DB);

if($connection->connect_error) die("Error: " . $connection->connect_error);
// echo "Success!";