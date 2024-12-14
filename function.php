<?php
require "config.php";

// $mysqli = dbConnect();
// $result = $mysqli->query("SELECT * FROM sign_up");
// while ($row = $result->fetch_assoc())
//     return ("Location: login.php");


if (!empty($_SESSION["id"])) {
    $mysqli = dbConnect();
    $id = $_SESSION["id"];
    $result = mysqli_query($mysqli, "SELECT * FROM sign_up WHERE id = $id");
    $row = mysqli_fetch_array($result);
} else {
    header("Location: login.php");
}


function dbConnect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

    if ($mysqli->connect_errno != 0) {
        return FALSE;
    } else {
        return $mysqli;
    }
}
function getCategories()
{
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT DISTINCT category FROM products");
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    return $categories;
}

function getHomePageProducts($int)
{
    $mysqli = dbConnect();
    $result = $mysqli->query("SELECT * FROM products ORDER BY rand() LIMIT $int");
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function getProductsByCategory($category)
{
    $mysqli = dbConnect();

    $stmt = $mysqli->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}


function getProductByTitle($title)
{
    $mysqli = dbConnect();

    $stmt  = $mysqli->prepare("SELECT * FROM products WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
}
