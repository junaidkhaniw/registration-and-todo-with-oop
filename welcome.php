<?php

include "./templates/header.php";

// session_start();

if (!isset($_SESSION["user_login"]) || $_SESSION["user_login"] != true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION["email"]; ?></h1>
</body>
</html>