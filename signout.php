<?php
include("config.php");
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Log Out</h2>
    <form class="" action="./index.php" method="post">

    </form>
</body>

</html>