<?php
include_once "./config/db.php";
include_once "./utils/functions.php";
include_once "./store/store.php";

$name = "";
$email = "";
$phone = "";
$pwd = "";
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }

    $query = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = $connection -> query($query);
    $row = $result -> fetch_assoc();
    
    if(!$row) {
        header("Location: index.php");
        exit;
    }
}
else {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $pwd = sanitize($_POST['pwd']);

    $query = "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pwd' WHERE `id` = '$id'";
    $result = $connection -> query($query);
    header("Location: index.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">CRUD</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="index.php" aria-current="page" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="create.php" type="button" class="btn btn-primary nav-link active">Add New</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-lg-6 m-auto my-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header bg-primary my-2">
                    <h1 class="text-white text-center">Update user details</h1>
                </div>
                <br>

                <?php $user = get_user_id($_GET['id']); ?>

                <input type="hidden" name="id" value="<?= $user ?>" class="form-control"> <br>

                <label>Name: </label>
                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control"> <br>

                <label>Email: </label>
                <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control"> <br>

                <label>Phone: </label>
                <input type="text" name="phone" value="<?= $user['phone'] ?>" class="form-control"> <br>

                <label>Password: </label>
                <input type="text" name="pwd" value="<?= $user['password'] ?>" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="update">Submit</button> <br>
                <a href="index.php" type="submit" name="cancel" class="btn btn-info">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>