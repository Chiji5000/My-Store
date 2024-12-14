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
    <title>Feel free to talk to us</title>
</head>

<body id="contact">
    <?php
    include("./nav.php");

    ?>

    <main>
        <div class="container">
            <div class="p-4 p-md-5 mb-4 rounded text-bg-dark mt-3">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">Contact Us....</h1>
                    <p class="lead my-3">Don't be scared you to contact us, feel free to leave a message</p>
                    <p class="lead mb-0"><a href="#" class="text-white fw-bold">Know More About Us...</a></p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row pb-3">
                <div class="col-md-6">
                    <img src="./img/contact-us.png" alt="" style="width: 100%;height: 100%;">
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-5">
                        <p class="d-inline-block border rounded-pill py-1 px-4">Contact Us</p>
                        <h1 class="mb-4">Have Any Query? Please Contact Us!</h1>
                        <form method="post" action="send-email.php">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px" name="message"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-xl-12 tm-contact-col-r">
                <!-- Map -->
                <div class="mapouter mb-4">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="520" id="gmap_canvas" src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
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