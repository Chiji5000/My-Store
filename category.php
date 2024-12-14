<?php
require "./function.php";
?>

<?php
if (isset($_GET['category'])) {
    $cat = urldecode($_GET['category']);
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
    <title>Document</title>
</head>

<body>
    <?php
    include("./nav.php");

    ?>

    <?php
    include("./header.php");
    ?>

    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">

                <article class="blog-post">
                    <div class="section-title">Product Categories</div>
                    <?php
                    $categories = getCategories();
                    ?>
                    <?php
                    foreach ($categories as $category) {
                    ?>
                        <a href="category.php?category=<?php echo urlencode($category['category']) ?>"><?php echo ucfirst($category['category']) ?></a>
                    <?php
                    }
                    ?>
                    <div class="product-right pt-5">
                        <div class="section-title pb-4">Products in the <?php echo ucfirst($cat) ?> Category</div>
                        <?php $products = getProductsByCategory($cat) ?>
                        <div class="product">
                            <?php
                            foreach ($products as $product) {
                            ?>
                                <div class="product-left" style="width: 50%;height: 50%;">
                                    <img src="<?php echo "img/{$product['image']}" ?>" alt="" style="width: 50%;height: 50%;">
                                </div>
                                <div class="product-right">
                                    <p class="title">
                                        <a href="product.php?title=<?php echo urlencode($product['title']) ?>"><?php echo $product['title'] ?></a>
                                    </p>
                                    <p class="description"><?php echo $product['description'] ?></p>
                                    <p class="price"><?php echo $product['price'] ?>&dollar;</p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
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
    </main>



    <?php
    include("./footer.php");
    ?>
</body>

</html>