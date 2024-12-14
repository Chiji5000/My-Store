<?php
require "./function.php";
?>

<?php
if (isset($_GET['title'])) {
    $title = urldecode($_GET['title']);
    $product = getProductByTitle($title);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $product[0]["meta_description"] ?>">
    <meta name="keywords" content="<?php echo $product[0]["meta_keywords"] ?>">
    <link rel="stylesheet" href="./css/style.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <?php
    include("./nav.php");

    ?>

    <?php
    include("./header.php");
    ?>

    <style>
        button.pay {
            color: white !important;
            width: 120px;
            height: 50px;
            border: none;
            background-color: crimson;
            text-transform: uppercase;
        }

        button.pay:hover {
            color: crimson !important;
            background-color: white;
            border: 2px solid crimson;
        }

        .title {
            font-size: 28px;
            color: saddlebrown;
        }

        .comments .comment_header {
            display: flex !important;
            justify-content: space-between !important;
            border-bottom: 1px solid #eee !important;
            padding: 15px 0 !important;
            margin-bottom: 10px !important;
            align-items: center !important;
        }

        .comments .comments_header .total {
            color: #777777 !important;
            font-size: 14px !important;
        }

        .comments .comments_header .write_comment_btn {
            margin: 0 !important;
        }

        .comments .write_comment_btn,
        .comments .write_comment button {
            display: inline-block !important;
            background-color: #565656 !important;
            color: #fff !important;
            text-decoration: none !important;
            margin: 10px 0 0 0 !important;
            padding: 5px 10px !important;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600px;
            border: 0;
        }

        .comments .write_comment_btn:hover,
        .comments .write_comment button:hover {
            background-color: #636363;
        }

        .comments .write_comment {
            display: none;
            padding: 20px 0 10px 0;
        }

        .comments .write_comment textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            height: 150px;
            margin-top: 10px;
        }

        .comments .write_comment input {
            display: block;
            width: 250px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }

        .comments .write_comment button {
            cursor: pointer;
        }

        .comments .comment {
            padding-top: 10px;
        }

        .comments .comment .name {
            display: inline;
            padding: 0 5px 3px 0;
            margin: 0;
            font-size: 16px;
            color: #555555;
        }

        .comments .comment .date {
            color: #888888;
            font-size: 14px;
        }

        .comments .comment .content {
            padding: 5px 0 5px 0;
        }

        .comments .comment .reply_content_btn {
            display: inline-block;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
            color: #888888;
        }

        .comments .comment .replies {
            padding-left: 30px;
        }
    </style>

    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    <?php echo $product[0]['title'] ?>
                </h3>

                <article class="blog-post">
                    <h2 class="blog-post-title mb-1">Product by</h2>
                    <p class="blog-post-meta"><?php echo $product[0]['date'] ?> <a href="#">Mark</a></p>

                    <div class="section-title pb-2">Product Categories</div>
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
                        <div class="product">
                            <div class="product-left">
                                <img src="<?php echo "img/{$product[0]['image']}" ?>" alt="" style="width: 50%;height: 50%;">
                            </div>
                            <div class="product-right pb-5">
                                <p class="title">
                                    <?php echo $product[0]['title'] ?>
                                </p>
                                <p class="description"><?php echo $product[0]['description'] ?></p>
                                <p class="price"><?php echo $product[0]['price'] ?>&dollar;</p>
                                <form method="post" action="checkout.php">
                                    <button class="pay">Pay</button>
                                </form>
                                <div class="comments">


                                </div>
                            </div>
                            <?php
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
    <script>
        const comments_page_id = 1;
        fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
            document.querySelector(".comments").innerHTML = data;
            document.querySelectorAll(".comments .write_comment_btn, comment_btn, .comments .reply_comment_btn").forEach(element => {
                element.onclick = event => {
                    event.preventDefault();
                    document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
                    document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
                    document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']input[name='name']").focus();
                };
            });
            document.querySelectorAll(".comments .write_comment form").forEach(element => {
                element.onsubmit = event => {
                    event.preventDefault();
                    fetch("comments.php?page_id=" + comments_page_id, {
                        method: 'POST',
                        body: new FormData(element)
                    }).then(response => response.text()).then(data => {
                        element.parentElement.innerHTML = data;
                    });
                };
            });
        });
    </script>
    <?php
    include("./footer.php");
    ?>
</body>

</html>