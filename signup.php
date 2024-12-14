<?php
include("config.php");
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we sell different items, what ever you're looking for">
    <meta name="keywords" content="gadgets like phones, electronics, electronic devices etc">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <title>It's never to late to sign Up</title>
</head>

<body>
    <?php
    include("./nav.php");
    ?>
    <style>
        input[type="email"],
        input[type="password"],
        input[type="text"] {
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

        input[type="text"]:focus {
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
            margin-top: 10px;
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

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    // init configuration
    $clientID = '823282119688-02k4ljp6pc70p34dvcg4vsssuece4ugf.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost/my-store/index.php';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;

        // now you can use this profile info to create account in your website and make user logged in.
    } else {
        echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
    }
    function sendemail_verify($username, $email, $verify_token)
    {
        $mail = new PHPMailer(true);                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->SMTPAuth   = true;                                                //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        //Enable SMTP authentication
        $mail->Username   = 'cjiruke@gmail.com';                     //SMTP username
        $mail->Password   = 'osom sseq ljya zcmo';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients

        $mail->setFrom('cjiruke@gmail.com', $username);
        $mail->addAddress($email);     //Add a recipient

        //Attachment
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification Message';

        $email_template = "
    <h2>You have Registered with us</h2>
    <h3>Verify your email address with the given link</h3>
    <br>
    <br>
    <a href='http://localhost/my-store/verify-email.php?token=$verify_token'>Click Me</a>
    ";

        $mail->Body = $email_template;
        $mail->send();
        echo "<h1>Message has been sent</h1>";
    }
    if (isset($_POST["submit"])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_SPECIAL_CHARS);
        $mysqli = dbConnect();
        $verify_token = md5(rand());
        $duplicate = mysqli_query($mysqli, "SELECT * FROM sign_up WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script>alert('Username or Email has already been taken'); </script>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($password == $password_confirm) {
                $query = "INSERT INTO sign_up (username, email, password, verify_token)
             VALUES('$username', '$email', '$hash', '$verify_token')";
                mysqli_query($mysqli, $query);
                sendemail_verify("$username", "$email", "$verify_token");

                echo "<script>alert('Registration Successful'); </script>";
            } else {
                echo "<script>alert('Password Does not match'); </script>";
            }
        }
    }

    ?>

    <main class="">
        <div class="container">
            <div class="row pt-4 pb-4">
                <div class="col-md-6 statue">
                    <img src="./img/legs.png" style="width: 100%;height: 80vh;">
                </div>
                <div class="col-md-6">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="login">
                        <?php
                        if (isset($_SESSION['status'])) {
                            echo "<h4>" . $_SESSION['status'] . "</h4>";
                            unset($_SESSION['status']);
                        }
                        ?>
                        <h2>Register Here</h2>
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="@email.com">
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="confirm-password" placeholder="Confirm Password">
                        <input type="submit" value="Sign Up" name="submit">

                        <h3>OR <br>Sign with</h3>
                        <div class="icons">

                        <?php
                            //Load Composer's autoloader
                            require 'vendor/autoload.php';

                            // init configuration
                            $clientID = '823282119688-02k4ljp6pc70p34dvcg4vsssuece4ugf.apps.googleusercontent.com';
                            $clientSecret = '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';
                            $redirectUri = 'http://localhost/my-store/index.php';

                            // create Client Request to access Google API
                            $client = new Google_Client();
                            $client->setClientId($clientID);
                            $client->setClientSecret($clientSecret);
                            $client->setRedirectUri($redirectUri);
                            $client->addScope("email");
                            $client->addScope("profile");

                            // authenticate code from Google OAuth Flow
                            if (isset($_GET['code'])) {
                            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                            $client->setAccessToken($token['access_token']);

                            // get profile info
                            $google_oauth = new Google_Service_Oauth2($client);
                            $google_account_info = $google_oauth->userinfo->get();
                            $userinfo = [
                                'email' => $google_account_info['email'],
                                'full_name' => $google_account_info['username'],
                                'token' => $google_account_info['id']
                            ];

                            $sql = "SELECT * FROM sign_up WHERE email = '{$userinfo['email']}'";
                            $mysqli = dbConnect();
                            $result = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($result) > 0){

                            } else {
                                $sql = "INSERT INTO users sign_up(email, username, token) VALUES ('{$userinfo['email']}', '{$userinfo['full_name']}', '{$userinfo['token']}')";
                            }
                            // now you can use this profile info to create account in your website and make user logged in.
                            } else {
                            echo "<button><a href='" . $client->createAuthUrl() . "'>Login With Google</a></button>";
                            }
                            // echo <button>"<a href='" . $client->createAuthUrl() . "'><i class="fab fa-google"></i> Sign in With Google</a>"</button>
                        ?>
                        </div>
                    </form>
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