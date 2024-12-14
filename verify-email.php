<?php
session_start();
include("config.php");
function dbConnect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

    if ($mysqli->connect_errno != 0) {
        return FALSE;
    } else {
        return $mysqli;
    }
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $mysqli = dbConnect();
    $verify_query = "SELECT verify_token, verify_status FROM sign_up WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($mysqli, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if ($row['verify_status'] == "0") {
            $clicked_token = $row['$verify_token'];
            $update_query = "UPDATE sign_up SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($mysqli, $update_query);

            if ($update_query_run) {
                $_SESSION['status'] = "Your Account has been Verified Successfully..!!";
                header("Location: login.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Verification Failed.!!";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Email Already Verified Please Log In";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "This token does not Exists";
        header("Location: login.php");
    }
} else {
    $_SESSION['status'] = "Not Allowed";
    header("Location: login.php");
}
