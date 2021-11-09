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
<body>
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
                    <span class="navbar-toggler-icon"></span>
                </button>
                  <!--When the website is view in smaller devices the navbar changes into a burger menu-->
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="text-light nav-item nav-link active" href="index.php">Home</a>
                        <a class="text-light nav-item nav-link" href="about.php">About</a>
                        <a class="text-light nav-item nav-link" href="contact.php">Contact</a>
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
                <form method="POST" action="login.php" id="login-form">
                    <div class="modal-body">
                        <div>
                            <label for="username-login">Username:</label>
                            <input type="text" name="username_login" class="form-control" id="username_login">
                            <small id="ulogin-error">Invalid Error</small>
                        </div>
                        <div>
                            <label for="password-login">Password:</label>
                            <input type="password" name="password_login" class="form-control" id="password_login">
                            <small id="plogin-error">Invalid Error</small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between bg-dark">
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
    <div class="container">
        <div class="row justify-content center">
            <div class="col-lg-5">
                <div class="contact">
                    <!--A informative details about contacting the business email, number, etc.-->
                    <h2 class="display-4" style="text-align: center">Contact Us</h2>
                    <p>If your interested in the service we provide please contact us. We'd love to talk to you and resolve any problems and queries you may have. Can't wait to have an amazing photoshot with us, please fill-in the registration below and book an appointment us. If your already a member, please login and book an appointment. Looking forward to seeing you.
                        <br>
                    <h3 class="display-6">Contact Details</h3>
                    <p>Our Address: <strong>8 Castle Street, Lincolnshire, DN1 9AQ</strong></p>
                    <p>Our Telephone: <strong>+44 020 7946 0919</strong></p>
                    <p>Our Email: <strong>smile@gmail.co.uk</strong></p>
                    <p>Our Opening Hours: <strong>Mon-Sun: 9:30am - 20:00pm</strong></p>
                </div>
            </div>
            <div class="location col-lg-6 ">
                <img src="images/location.jpg" width="100%" height="100%">

            </div>
        </div>
    </div>
    <main>
        <!--A registeration form new members to sign-up and become a memeber-->
        <form method="POST" action="registration.php" id="register-form">
            <fieldset>
                <div class="register container bg-light">
                    <h2 class=display-4>Register</h2>
                    
                         <?php
                    //if username is not set allow direct user to login form
                          if (!isset($_SESSION['username'])){
                            $_SESSION['amember'] = "<p>To book an appointment with us you must have an account. <a href='#' data-toggle='modal' data-target='#login'>Already a member?</a></p>";
                            echo $_SESSION['amember'];
                           }
                         ?>                    
                        <?php
                    //if the session is not set then prevent user from getting directed to the login form
                          if (isset($_SESSION['username'])){
                            $_SESSION['nowmember'] = "<p>To book an appointment with us you must have an account. <a class='nav-link disabled' href='#' data-toggle='modal' data-target='#login'>Already a member?</a></p>";
                            echo $_SESSION['nowmember'];
                           }
                         ?>
                    <div>
                        <!--Input for username-->
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter a username" maxlength="15">
                        <small id="username-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for user first name-->
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your first name" maxlength="30" style="text-transform: capitalize">
                        <small id="fname-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for user surname-->
                        <label for="sname">Surname:</label>
                        <input type="text" name="sname" class="form-control" id="sname" placeholder="Enter your surname" maxlength="30" style="text-transform: capitalize">
                        <small id="sname-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for user mobile number-->
                        <label for="pnum">Phone Number:</label>
                        <input type="tel" name="pnum" class="form-control" id="pnumber" placeholder="Enter your phone number" minlength="11" maxlength="11">
                        <small id="pnum-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for user email-->
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="e.g John@example.com" maxlength="30">
                        <small id="email-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for user password-->
                        <label for="psw">Password:</label>
                        <input type="password" name="psw" class="form-control" id="psw" placeholder="Enter a password" maxlength="30">
                        <small id="psw-error">Invalid Input Error</small>
                    </div>

                    <div>
                        <!--Input for confirmation-->
                        <label for="psw-confirmation">Password Confirmation:</label>
                        <input type="password" class="form-control" id="psw-confirmation" placeholder="re-enter password" maxlength="30">
                        <small id="psw-confirmation-error">Invalid Input Error</small>
                    </div>
                    <div>
                        <button type="submit" onclick="isValid()" class="registerbtn col-md-12">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </main>
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
    <script src="assets/validation.js"></script>



</body>

</html>
