<?php
session_start();
if(!empty($_SESSION["userId"])) {
    //require_once 'admin.php';
    header("Location: admin.php", TRUE, 301);
} else {
    //require_once '../login.php';
    header("Location: ../login.php", TRUE, 301);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>