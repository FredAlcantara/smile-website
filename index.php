<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head lang="en">

    <meta charset="utf-8">
    <title>Smile</title>
    <!--Responsiveness of website is intialsed here, intilialising the scale of the webpage to 1-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BOOTSTRAP CSS extension implemented for design and layout of the website-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Linking the CSS file in the html-->
    <link rel="stylesheet" href="assets/style.css">
</head>
<!--Body tag, containing information and images to provide an idea what the business is about-->
<body>
    <div id="hero-image">
        <header>
            <div class="header-container bg-dark">
                <img src="images/logo.png" class="logo">
                <! –– * Title: Bootstrap Navbar (code adapted)
                      * Author: getbootstrap.com 
                      * Date: 22/03/2021
                      * Availability: https://getbootstrap.com/docs/5.0/components/navbar/
                ––>
                    <!-- BOOTSTRAP documentation for navbar is used to create a burger icon when view in small device, improving reponsiveness.
                    Small changes have been created such as the appearance of the menu to ensure that it fits the theme of the website, such as making the colour dark-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon "></span>
                        </button>
                        <!--When the website is view in smaller devices the navbar changes into a burger menu-->
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <!-- Navigation links which direct users to other pages-->
                                <a class="text-light nav-item nav-link active" href="index.php">Home</a>
                                <a class="text-light nav-item nav-link" href="about.php">About</a>
                                <a class="nav-link text-light nav-item nav-link" href="contact.php">Contact</a>
                                <?php
                           //if session username is active, then enable the booking link to users who are logged in the page, else, do not display
                          if (isset($_SESSION['username'])){
                            $_SESSION['booking'] = "<a class='text-light nav-item nav-link' href='booking.php'>Booking</a>";
                            echo $_SESSION['booking'];
                           }
                         ?>
                                <?php
                            //if session username is active then show the logout button which unsets the session and destroy it
                        if (isset($_SESSION['username'])){
                            $_SESSION['logout'] = "<a class='text-light nav-item nav-link' href='logout.php'>Logout</a>";
                            echo $_SESSION['logout'];
                        }
                        ?>
                                <?php
                            //if the session is not active then display the login link as the user will not be logged in when they open the site
                          if (!isset($_SESSION['username'])){
                            $_SESSION['login'] = "<a class='text-light nav-item nav-link' href='#' data-toggle='modal' data-target='#login'>Login</a>";
                            echo $_SESSION['login'];
                           }
                         ?>
                            </div>
                        </div>
                    </nav>

            </div>
        </header>

        <! –– * Title: Bootstrap Modal (code adapted)
              * Author: getbootstrap.com 
              * Date: 22/03/2021 
              * https://getbootstrap.com/docs/5.0/components/modal/
        ––>
            <!-- BOOTSTRAP documentation for modal to create a login form for users, made changes from BOOTSTRAP example 
                     by changing the overall design and functionality such making it dark theme to suit my website and have 
                     the function of logging in the website-->

            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-light">
                            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--a form which contains a POST method as it used to collect form data after submission -->
                        <form method="POST" action="login.php" id="login-form">
                            <div class="modal-body">
                                <div>
                                    <label for="username-login">Username:</label>
                                    <input type="text" name="username_login" class="form-control" id="username_login">
                                    <!--Small tag is used for indication of error in the CSS file, style display is set to none-->
                                    <small id="ulogin-error">Invalid Error</small>
                                </div>
                                <div>
                                    <label for="password-login">Password:</label>
                                    <input type="password" name="password_login" class="form-control" id="password_login">
                                    <!--Small tag is used for indication of error in the CSS file, style display is set to none-->
                                    <small id="plogin-error">Invalid Error</small>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between bg-dark">
                                <!--"Not yet a member" to direct users to the contact page to register-->
                                <p><a class="text-muted" href="contact.php" style="text-decoration: none">Not a member yet?</a></p>
                                <div class="justify-content-end">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="brief col col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-white">
                    <h1 class="display-3">Smile</h1>
                    <p style="font-size: 12px; margin-top: -15px;text-transform: uppercase"> Bringing memories to life.</p>
                    <!-- A brief description of what the business is about-->
                    <div class="description">
                        <p>
                            We are Smile a UK photography firm that is located in the historical and coastal region of the United Kindom, Lincolnshire. It is our duty and mission to capture mesmerising images of you or your love ones, ensuring life, enjoyment and happiness for many years. We ensure that our service is kept optimal to bring a smile to your face.
                        </p>
                        <?php
                    //If the usename is not active then allocate the book now button to the login form, instead of re-directing users to the booking page 
                          if (!isset($_SESSION['username'])){
                            $_SESSION['booknow'] = "<button type='button' data-toggle='modal' data-target='#login'>Book now</button>";
                            echo $_SESSION['booknow'];
                           }
                         ?>
                        <?php
                    //If the username is active then use the booking button functionality to direct users to the booking page
                          if (isset($_SESSION['username'])){
                            $_SESSION['booknowactive'] = "<button type='button'><a href='booking.php'>Book now</a></button>";
                            echo $_SESSION['booknowactive'];
                           }
                         ?>
                    </div>
                </div>
            </div>
    </div>
    <!--The footer contains information of Copy Right and social links-->
    <footer class="bg-dark text-white text-lg-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <h5 class="text-uppercase">Follow Us</h5>
                    <ul class="list-group list-group-horizontal list-unstyled borderless">
                        <li class="list-group-item"><a href="https://www.facebook.com/"><img src="images/facebook.png"></a></li>
                        <li class="list-group-item"><a href="https://www.instagram.com/"><img src="images/instagram.png"></a> </li>
                        <li class="list-group-item"><a href="https://twitter.com/"><img src="images/twitter.png"></a></li>
                    </ul>
                    <p><em>Copyright &copy; Smile</em></p>

                </div>

                <div class="col-lg-3">
                    <h5 class="text-uppercase">Contact us</h5>

                    <ul class="list-unstyled">
                        <li>8 Castle Street, Lincolnshire, DN1 9AQ</li>
                        <li>+44 020 7946 0919</li>
                        <li>smile@gmail.co.uk</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">DISCLAIMER:</h5>
                    <p>
                        Smile is a fictitious brand created solely for the purpose of the
                        assessment of IN1010 module at City, University of London, UK. All products and
                        people associated with Smile are also fictitious. Any resemblance to real
                        brands, products, or people is purely coincidental. Information provided about the
                        product is also fictitious and should not be construed to be representative of actual
                        products on the market in a similar product category.
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!--BOOTSTRAP js link source found in BOOTSTRAP documentation-->
    <! –– * Title: Bootstrap js external link
          * Author: getbootstrap.com 
          * Date: 22/03/2021 
          * https://getbootstrap.com/docs/4.0/getting-started/introduction/
        ––>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</body>

</html>
