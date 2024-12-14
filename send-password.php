<!-- <?php
        session_start();
        ?> -->

<?php
include("config.php");

require "./function.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name, $get_email, $token)
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

    $mail->setFrom('cjiruke@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient

    //Attachment
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';

    $email_template = "
    <h2>Hello</h2>
    <h3>You are recieving This email because we recieved a password reset request for your account</h3>
    <br>
    <br>
    <a href='http://localhost/my-store/password-change.php?token=$token&email=$get_email'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}


if (isset($_POST["submit"])) {
    $mysqli = dbConnect();
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $token = md5(rand());

    $check_email = "SELECT email FROM sign_up WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($mysqli, $check_email);


    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE sign_up SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($mysqli, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "<script>alert('We e-mailed you a password reset link'); </script>";
            header("Location: forgot_password.php");
            exit(0);
        } else {
            $_SESSION['status'] = "<script>alert('Something Went wrong. #1'); </script>";
            header("Location: forgot_password.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "<script>alert('No Email Found'); </script>";
        header("Location: forgot_password.php");
        exit(0);
    }
}

if (isset($_POST['password_update'])) {
    $mysqli = dbConnect();
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $new_password = mysqli_real_escape_string($mysqli, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($mysqli, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($mysqli, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            $check_token = "SELECT verify_token FROM sign_up WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($mysqli, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                $hash = password_hash($new_password, PASSWORD_DEFAULT);
                if ($new_password == $confirm_password) {
                    $update_password = "UPDATE sign_up SET password='$hash' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($mysqli, $update_password);

                    if ($update_password_run) {
                        $new_token = md5(rand()) . "funda";
                        $update_to_new_token = "UPDATE sign_up SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($mysqli, $update_to_new_token);

                        $_SESSION['status'] = "<script>alert('New Password Successfully changed'); </script>";
                        header("Location: index.php");
                        exit(0);
                    } else {
                        $_SESSION['status'] = "<script>alert('Did not Update Password Something went wrong'); </script>";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = "<script>alert('Password and Confirm Password does not match); </script>";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "<script>alert('Invalid Token'); </script>";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "<script>alert('All fields are Mandatory'); </script>";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "<script>alert('No Token Available'); </script>";
        header("Location: password-change.php");
        exit(0);
    }
}
