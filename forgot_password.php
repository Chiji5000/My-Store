<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
</head>

<style>
    .form {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100vh;
        justify-content: center !important;
        align-items: center !important;
    }

    input[type="email"] {
        border: none !important;
        border-bottom: 1px solid grey !important;
        padding: 30px 0 !important;
        width: 30% !important;
        outline: none !important;
        background-color: white !important;
        padding: 20px 0;
    }

    input[type="email"]:focus {
        border: 1px solid white !important;
        border-bottom: 1px solid blueviolet !important;
        background-color: white !important;
    }

    input[type="submit"] {
        width: 30%;
        border: none !important;
        color: #fff;
        background-color: blueviolet;
        padding: 5px;
        margin-top: 10px;
    }
</style>

<body>
    <?php
    include("./nav.php");


    ?>
    <form method="post" action="send-password.php" class="form pt-5">
        <h1 class="pt-5">Forgot Password</h1>
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <h5><?= $_SESSION['status']; ?></h5>
        <?php
            unset($_SESSION["status"]);
        }
        ?>


        <input type="email" name="email" id="email" placeholder="@email.com" class="pt-5">

        <input type="submit" name="submit" value="Recover Password">

        <?php
        include("./footer.php");
        ?>

        <script src="./js/jquery-4.0.0-beta.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/script.js"></script>
</body>

</html>