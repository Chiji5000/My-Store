<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we sell different items, what ever you're looking for">
    <meta name="keywords" content="gadgets like phones, electronics, electronic devices etc">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <title>Log In</title>
</head>

<body>
    <?php
    include("./nav.php");

    ?>

    <?php

    function dbConnect()
    {
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

        if ($mysqli->connect_errno != 0) {
            return FALSE;
        } else {
            return $mysqli;
        }
    }

    if (!empty($_SESSION["id"])) {
        header("Location: index.php");
    }
    if (isset($_POST["submit"])) {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $mysqli = dbConnect();
        $result = mysqli_query($mysqli, "SELECT * FROM sign_up WHERE  email = '$email'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
            } else {
                echo "<script> alert('Wrong Password');</script>";
            }
        } else {
            echo "<script> alert('User not Registered');</script>";
        }
    }
    ?>

    <style>
        input[type="email"],
        input[type="password"] {
            border: none !important;
            border-bottom: 1px solid grey !important;
            padding: 30px 0 !important;
            width: 70% !important;
            outline: none !important;
            background-color: white !important;
        }

        input[type="email"]:focus {
            border: 1px solid white !important;
            border-bottom: 1px solid blueviolet !important;
            background-color: white !important;
        }

        input[type="password"]:focus {
            border: 1px solid white !important;
            border-bottom: 1px solid blueviolet !important;
            background-color: white !important;
        }

        .got {
            padding: 20px 0 !important;
        }

        input[type="submit"] {
            width: 70%;
            border: none !important;
            color: #fff;
            background-color: blueviolet;
            padding: 5px;
        }

        .login h3 {
            text-align: center;
            font-size: 1.3rem;
            padding: 20px 0;
        }

        .icons a {
            text-decoration: none;
            color: black !important;
        }

        .icons button {
            border: none !important;
            padding: 10px !important;
        }

        .fa-google {
            color: chocolate;
        }

        .statue {
            align-self: center;
        }
    </style>


    <main class="">
        <div class="container">
            <div class="row pt-4 pb-4">
                <div class="col-md-6">
                    <form action="" method="post" class="login">
                        <?php
                        if (isset($_SESSION["status"])) {
                        ?>
                            <h5><? $_SESSION['status']; ?></h5>
                        <?php
                            unset($_SESSION["status"]);
                        }
                        ?>
                        <h2>Welcome</h2>
                        <input type="email" name="email" placeholder="@email.com">
                        <input type="password" name="password" placeholder="Password">
                        <a href="./forgot_password.php" class="got">Forgot Password</a>
                        <input type="submit" value="Login" name="submit">

                        <h3>or Sign with</h3>
                        <div class="icons">
                            <button><a href="https://fb.com/templatemo"><i class="fab fa-google"></i> Sign in With Google</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 statue">
                    <img src="./img/statue.jpg" style="width: 100%;height: 70vh;">
                </div>
            </div>
        </div>
    </main>


    <?php

    include("./footer.php");
    ?>
    <script src="./js/jquery-4.0.0-beta.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>