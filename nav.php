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
    <div class="title">
        <h2>IRUKE BOY E-COMMERCE WEBPAGE</h2>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4 z-2" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item links">
                            <a class="nav-link" data-active="index" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item links">
                            <a class="nav-link" data-active="about" href="about-us.php">About-Us</a>
                        </li>
                        <li class="nav-item links">
                            <a class="nav-link" data-active="contact" href="contact-us.php">Contacts</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
                        <li class="nav-item links">
                            <a class="nav-link" data-active="login" href="login.php">Log In</a>
                        </li>
                        <li class="nav-item links">
                            <a class="nav-link" data-active="signup" href="signup.php">Sign-Up</a>
                        </li>
                        <li class="nav-item links">
                            <a class="nav-link" data-active="signup" href="./signout.php">Log Out</a>
                        </li>

                    </ul>
                    <form class="d-flex mt-3 mt-lg-0" role="search" method="post" action="search.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-light" type="submit" name="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>