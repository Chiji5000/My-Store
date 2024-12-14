<?php
require 'function.php';
?>

<?php
    require 'vendor/autoload.php';


    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        echo "<pre>";
        print_r($google_account_info);
        // now you can use this profile info to create account in your website and make user logged in.
    } 

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
    include("./carousel.php");
    ?>


    <div class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h1>Welcome <?php echo $row["username"]; ?></h1>
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Pick From Our Wide range of Products
                </h3>

                <article class="blog-post">

                    <?php $products = getHomePageProducts(4) ?>
                    <div class="product">
                        <?php
                        foreach ($products as $product) {
                        ?>
                            <div class="product-right">
                                <p class="title">
                                    <a href="product.php?title=<?php echo $product['title'] ?>">
                                        <?php echo $product['title'] ?>
                                    </a>
                                </p>
                                <div class="img" style="width:50%; height:50%;">
                                    <img src="<?php echo "img/{$product['image']}" ?>" alt="" style="width:50%; height:50%;">
                                </div>
                                <p class="description">
                                    <?php echo $product['description'] ?>
                                </p>
                                <p class="price">
                                    <?php echo $product['price'] ?>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                        <?php $products =  getHomePageProducts(2) ?>
                        <div class="col-md-12 d-flex flex-wrap justify-content-between pb-4">
                            <?php
                            foreach ($products as $product) {
                            ?>
                                <div class="sale">
                                    <div class="img">
                                        <img src="<?php echo "img/{$product['image']}" ?>" alt="">
                                    </div>
                                    <div class="write-up">
                                        <h3><a href="product.php?title=<?php echo urlencode($product['title']) ?>"><?php echo $product['title'] ?></a></h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores corrupti porro fugit!</p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <?php $products =  getHomePageProducts(2) ?>
                    <div class="col-md-12 d-flex flex-wrap justify-content-between pb-4">
                        <?php
                        foreach ($products as $product) {
                        ?>
                            <div class="sale">
                                <div class="img">
                                    <img src="<?php echo "img/{$product['image']}" ?>" alt="">
                                </div>
                                <div class="write-up">
                                    <h3><a href="product.php?title=<?php echo urlencode($product['title']) ?>"><?php echo $product['title'] ?></a></h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores corrupti porro fugit!</p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <?php $products = getHomePageProducts(4) ?>
                    <div class="product">
                        <?php
                        foreach ($products as $product) {
                        ?>
                            <div class="product-right">
                                <p class="title">
                                    <a href="product.php?title=<?php echo $product['title'] ?>">
                                        <?php echo $product['title'] ?>
                                    </a>
                                </p>
                                <div class="img" style="width:50%; height:50%;">
                                    <img src="<?php echo "img/{$product['image']}" ?>" alt="" style="width:50%; height:50%;">
                                </div>
                                <p class="description">
                                    <?php echo $product['description'] ?>
                                </p>
                                <p class="price">
                                    <?php echo $product['price'] ?>
                                </p>
                            </div>
                        <?php
                        }
                        ?>
                        <?php $products =  getHomePageProducts(2) ?>
                        <div class="col-md-12 d-flex flex-wrap justify-content-between pb-4">
                            <?php
                            foreach ($products as $product) {
                            ?>
                                <div class="sale">
                                    <div class="img">
                                        <img src="<?php echo "img/{$product['image']}" ?>" alt="">
                                    </div>
                                    <div class="write-up">
                                        <h3><a href="product.php?title=<?php echo urlencode($product['title']) ?>"><?php echo $product['title'] ?></a></h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores corrupti porro fugit!</p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>



                    <?php $products =  getHomePageProducts(2) ?>
                    <div class="col-md-12 d-flex flex-wrap justify-content-between pb-4">
                        <?php
                        foreach ($products as $product) {
                        ?>
                            <div class="sale">
                                <div class="img">
                                    <img src="<?php echo "img/{$product['image']}" ?>" alt="">
                                </div>
                                <div class="write-up">
                                    <h3><a href="product.php?title=<?php echo urlencode($product['title']) ?>"><?php echo $product['title'] ?></a></h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores corrupti porro fugit!</p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 6rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">Category</h4>
                        <p class="mb-0">Pick What Ever Category Of Item You're looking for.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Items</h4>
                        <ol class="list-unstyled mb-0 p-3">
                            <?php
                            $categories = getCategories();
                            ?>
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <a href="category.php?category=<?php echo urlencode($category['category']) ?>"><?php echo ucfirst($category['category'] . "<br>") ?></a>
                            <?php
                            }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="elec container-fluid py-5 d-flex justify-content-between">
                        <div class="write">
                            <h1 class="display-5 fw-bold text-success">Electronic Gadgets <br> <span class="text-warning">50% Off</span></h1>
                            <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci illum iure dolorum totam ratione dolor ducimus facilis est doloremque fugit!</p>
                            <button class="btn btn-primary btn-lg" type="button">Click Here</button>
                        </div>
                        <div class="img" style="width: 50%;">
                            <img src="./img/electronics.png" class="" alt="..." style="width: 100%;height: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-3">
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3 d-flex justify-content-between">
                    <div class="write">
                        <h2>Best HeadPhones</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, ut?</p>
                        <button class="btn btn-outline-light" type="button">Shop Now</button>
                    </div>
                    <div class="img" style="width: 50%;">
                        <img src="./img/headphone.png" style="width: 100%;height: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3 d-flex justify-content-between">
                    <div class="write">
                        <h2>Best Game Controllers</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, dolorem!</p>
                        <button class="btn btn-outline-secondary" type="button">Shop Now</button>
                    </div>
                    <div class="img" style="width: 80%;">
                        <img src="./img/controller.png" style="width: 100%;height: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-4 pt-2">
        <center>
            <div class="row">
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/download.jpeg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Sneakers</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3  pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/images.jpeg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Monitor</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/gold-watch.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Gold Watch</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/shirts.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Black Shirt</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <div class="container pb-4 pt-2">
        <center>
            <div class="row">
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/timberland.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Timberland</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3  pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/xbox-series-X.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Xbox Series S</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/playstation5.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Play Station 5</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pb-3">
                    <div class="what">
                        <div class="img">
                            <img src="./img/yellow-dress.jpg">
                        </div>
                        <div class="write-up">
                            <div class="title">
                                <h3>Nice Yellow Dress</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, voluptatem.</p>
                            <center><button class="btn btn-outline-secondary bt" type="button">Shop Now</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <hr>

    <div class="shipping-details container pt-5 pb-5">
        <div class="shipping">
            <i class="fa-solid fa-cart-shopping"></i>
            <h3>Free Shipping</h3>
            <p>Order Over $10000</p>
        </div>
        <div class="return">
            <i class="fa-solid fa-rotate-right"></i>
            <h3>Free Returns</h3>
            <p>Within 30 days</p>
        </div>
        <div class="delivery">
            <i class="fa fa-truck" aria-hidden="true"></i>
            <h3>Fast Delivery</h3>
            <p>World Wide</p>
        </div>
        <div class="choice">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <h3>Big Choice</h3>
            <p>Of Products</p>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>
    <script src="./js/jquery-4.0.0-beta.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>