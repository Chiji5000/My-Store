<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feel free to Change Your password</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
</head>

<body>
    <?php
    include("./nav.php");

    ?>



    <?php
    session_start();
    ?>


    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <h5><?= $_SESSION['status']; ?></h5>
    <?php
        unset($_SESSION["status"]);
    }
    ?>

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

        input[type="password"] {
            border: none !important;
            border-bottom: 1px solid grey !important;
            padding: 30px 0 !important;
            width: 30% !important;
            outline: none !important;
            background-color: white !important;
            padding: 20px 0;
        }

        input[type="password"]:focus {
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




    <form action="send-password.php" method="post" class="form">
        <h1>Change Your Password</h1>
        <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                                                                echo $_GET['token'];
                                                            } ?>"><br>
        <input type="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                    echo $_GET['email'];
                                                } ?>"><br>
        <input type="password" name="new_password" placeholder="Enter Password"><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
        <input type="submit" name="password_update" value="Update Password">
    </form>

    <?php
    include("./footer.php");
    ?>

    <script src="./js/jquery-4.0.0-beta.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>