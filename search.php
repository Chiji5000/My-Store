<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we sell different items, what ever you're looking for">
    <meta name="keywords" content="gadgets like phones, electronics, electronic devices etc">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Shop For What ever You're Looking for</title>
</head>

<body>
    <?php
    include("./nav.php");

    ?>

    <?php
    if (isset($_GET['title'])) {
        $title = urldecode($_GET['title']);
        $product = getProductByTitle($title);
    }

    ?>

    if (!empty($_SESSION["id"])) {
    $mysqli = dbConnect();
    $id = $_SESSION["id"];
    $result = mysqli_query($mysqli, "SELECT * FROM sign_up WHERE id = $id");
    $row = mysqli_fetch_array($result);
    } else {
    header("Location: login.php");
    }

    <?php

    $search =  $_POST['search'];
    $sql = "SELECT * FROM products WHERE title LIKE
'%$search%' OR category LIKE '%$search%'
";

    $res = mysqli_query($mysqli, $sql);

    $count = mysqli_num_rows($res);

    if ($count > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $mysqli = dbConnect();
            $id = $row['id'];
            $product = $row['price'];
            $product = $row['title'];
            $product = $row['image'];
    ?>

            <div class="img" style="width:50%; height:50%;">
                <img src="<?php echo "img/{$product['image']}" ?>" alt="" style="width:50%; height:50%;">
            </div>
            <div class="product-right">
                <p class="title">
                    <a href="product.php?title=<?php echo $product['title'] ?>">
                        <?php echo $product['title'] ?>
                    </a>
                </p>
                <p class="description">
                    <?php echo $product['description'] ?>
                </p>
                <p class="price">
                    <?php echo $product['price'] ?>
                </p>
            </div>

    <?php

        }
    } else {
        echo "<div class='alert alert-danger'>
        There is nothing matching your search....
    </div>";
    }

    ?>

    <?php
    include("./footer.php");
    ?>
    <script src="./js/jquery-4.0.0-beta.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>