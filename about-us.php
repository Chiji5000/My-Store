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
    <link rel="stylesheet" href="./css/style.scss">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>Get To Know More About Us</title>
</head>

<body id="about">
    <?php
    include("./nav.php");

    ?>

    <style>
        .team-item img {
            position: relative;
            top: 0;
            transition: .5s;
        }

        .team-item:hover img {
            top: -30px;
        }

        .team-item .team-text {
            position: relative;
            height: 100px;
            transition: .5s;
        }

        .team-item:hover .team-text {
            margin-top: -60px;
            height: 160px;
        }

        .team-item .team-text .team-social {
            opacity: 0;
            transition: .5s;
        }

        .team-item:hover .team-text .team-social {
            opacity: 1;
        }

        .team-item .team-social .btn {
            display: inline-flex;
            color: var(--primary);
            background: #FFFFFF;
            border-radius: 40px;
        }

        .team-item .team-social .btn:hover {
            color: #FFFFFF;
            background: darkcyan;
        }
    </style>

    <main>
        <div class="b-example-divider"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"><img src="./img/sitting.png" style="width: 100%;height: 100%;"></div>
                <div class="col-md-3 d-flex flex-wrap align-content-center justify-content-center">
                    <h2 class="fst-italic pb-3 about">About Us.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maiores eos, pariatur, nisi illo sunt dolorem provident. </p>
                </div>
                <div class="col-md-3 pb-5 pt-4 d-flex flex-wrap align-content-center justify-content-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae eius deleniti enim consequuntur, dolore assumenda saepe nostrum quisquam, sapiente voluptatibus atque distinctio blanditiis neque itaque quod eligendi repellat consequatur magnam quia nesciunt laudantium! Recusandae eos dolorum aliquid eveniet quos, dignissimos quisquam, aut beatae, nihil vel ipsam aperiam ea? Fugiat, ullam. </p>
                </div>
            </div>
        </div>


        <!-- The owl carousel Part -->
        <div class="b-example-divider"></div>
        <!-- client section -->
        <section class="client_section layout_padding text-bg-dark">
            <div class="container">
                <div class="custom_heading-container ">
                    <h2>
                        What is says our clients
                    </h2>
                </div>
                <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" data-bs-interval="10000">
                        <div class="carousel-item active">
                            <div class="client_container layout_padding2" data-bs-interval="10000">
                                <div class="client_detail">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                        alteration in
                                        some form, by injected humour, or randomised words which don't look even slightly believable.
                                    </p>
                                </div>
                                <div class="client_box ">
                                    <div class="img-box">
                                        <img src="./img/client.png " alt="" style="width: 20%;height: 20%;">
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Randomised
                                        </h5>
                                        <h6>
                                            <span>
                                                Client
                                            </span>
                                            <img src="./img/quote.png" alt="" style="width: 2%;height: 2%;">
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client_container layout_padding2" data-bs-interval="20000">
                                <div class="client_detail">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                        alteration in
                                        some form, by injected humour, or randomised words which don't look even slightly believable.
                                    </p>
                                </div>
                                <div class="client_box ">
                                    <div class="img-box">
                                        <img src="./img/man_smoke.jpg " alt="" style="width: 20%;height: 20%;">
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Randomised
                                        </h5>
                                        <h6>
                                            <span>
                                                Client
                                            </span>
                                            <img src="./img/quote.png" alt="" style="width: 2%;height: 2%;">
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client_container layout_padding2">
                                <div class="client_detail">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                        alteration in
                                        some form, by injected humour, or randomised words which don't look even slightly believable.
                                    </p>
                                </div>
                                <div class="client_box ">
                                    <div class="img-box">
                                        <img src="./img/team2.jpg " alt="" style="width: 20%;height: 20%;">
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Randomised
                                        </h5>
                                        <h6>
                                            <span>
                                                Client
                                            </span>
                                            <img src="./img/quote.png" alt="" style="width: 2%;height: 2%;">
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex flex-column">
                            <img class="img-fluid rounded w-75 align-self-end" src="./img/portrait-happy-lady-sunglasses-standing-with-colorful-shopping-bags-hands-pink-background-young-woman-standing-white-shirt-denim-shorts_574295-1182.avif" alt="">
                            <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="./img/women-shopping-summer-she-using-260nw-1027446970.webp" alt="" style="margin-top: -25%;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Why You Should Shop With Us? Get Know About Us!</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                        <p><i class="far fa-check-circle text-primary me-3"></i>Fast Delivery</p>
                        <p><i class="far fa-check-circle text-primary me-3"></i>Only Qualified Personels</p>
                        <p><i class="far fa-check-circle text-primary me-3"></i>Quick And Easy Refunds</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-5 text-bg-dark">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Staffs</p>
                    <h1>Our Experience Staffs</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="./img/beauty.jpeg" alt="">
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5 class="text-dark">Beauty</h5>
                                <p class="text-primary">Customer's Care</p>
                                <div class="team-social text-center text-dark">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="./img/pexels-alipazani-2625122.jpg" alt="">
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5 class="text-dark">Angel</h5>
                                <p class="text-primary">Counseling</p>
                                <div class="team-social text-center text-dark">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="./img/curly.jpg" alt="">
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5 class="text-dark">Chelsea</h5>
                                <p class="text-primary">Manager</p>
                                <div class="team-social text-center text-dark">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="./img/spot.jpg" alt="">
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5 class="text-dark">Savannah</h5>
                                <p class="text-primary">Technology</p>
                                <div class="team-social text-center text-dark">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php
    include("./footer.php");
    ?>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/owl.carousel.js"></script>
    <script type="text/javascript">
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [],
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(".owl-2").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [],
            autoplay: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <script script src="./js/script.js"> </script>

</body>

</html>