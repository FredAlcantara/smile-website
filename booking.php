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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Requested Appointments</h5><br>
                     <p style="font-size:8px;">Here are your appointments you've made with us. Newly member would have an empty page.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    //connecting to the database to obtain records
                    $conn = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt138', '200017471', 'adbt138'); 
                    if ($conn->connect_errno) {
                    printf("Connection failed: %s\n", $conn->connect_error);
                    exit();
                    }else{
                        if(isset($_SESSION['username'])){
                            $user = $_SESSION['username'];
                            //select the necessary details that is to be displayed for the user
                            $query = "SELECT reference,type,theme,day,time FROM booking WHERE reference = '$user' ";
                            $result = $conn->query($query);
                            //while there is a record found in the database echo in the modal body to showcase the user booking, else, echo nothing
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($row as $val){
                                    echo $val .  ' ';
                                }
                                 echo "<br>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="container">

            <?php
            //if the session username is active then showcase the users username like 'Welcome adbt138'
            if (isset($_SESSION['username'])){
                $_SESSION['users'] = "<div><h1 class='display-3' style='text-align: center;text-decoration-line: underline'>Welcome ".$_SESSION['username']."</h1></div>";
                echo $_SESSION['users'];
            }
            ?>
            <h2 class="display-4" style="text-align: center">Read To Have a PhotoShoot</h2>
            <p style="text-align: center">Please have a look at the form below and see possible dates and timeslots you can book for.<br> Our photoshoot session 3 hours long, so
                please select a suitable time frame for our service.</p>
            <!--A view request appointment which opens up modal and show the user their bookings-->
            <p style="text-align:center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a href="#">View Requested Appointment</a></p>
        </div>

    </div>
    <main>
        <div class="booking-form">
            <!--A booking form which records the provide input and sent to the database-->
            <form method="POST" action="appointment.php" name="booking" id="booking">
                <fieldset>
                    <div>
                        <h3 class="display-5" style="text-decoration-line: underline">Booking Form</h3>
                    </div>
                    <div class="mt-4">
                        <lable for="reference_name">Reference Name:</lable>
                        <?php
                        //if the username session is active then place their username inside the reference input
                        if (isset($_SESSION['username'])){
                            $_SESSION['reference'] = "<input type='text' name='reference' class='form-control' id='reference' value='".$_SESSION['username']."' readonly>";
                            echo $_SESSION['reference'];
                        }
                        ?>

                    </div>
                    <div>
                        <!--Input for the type of photoshot they like-->
                        <label for="people">Type of Photoshot:</label>
                        <input type="text" name="photo_type" id="type" class="form-control" placeholder="Provide a description of what type of photo you'd like.">
                        <small id="type-error">Error input.</small>
                    </div>
                    <div>
                        <!--Input for the type of theme they like-->
                        <label for="theme">Selection of Theme:</label>
                        <input type="text" name="theme" id="theme" class="form-control" placeholder="Give us a theme to work with.">
                        <small id="theme-error">Error input.</small>
                    </div>
                    <div>
                        <!--Input for date-->
                        <lable for="date">Pick a Date:</lable>
                        <input type="date" name="date" class="form-control" id="username" placeholder="Enter a reference name" maxlength="15" required>
                    </div>
                    <div>
                        <!--Input for time-->
                        <label for="time">Select a Time:</label>
                        <select class="form-select" id="time" name="time" required>
                            <option selected>Please Select A Time</option>
                            <option value="10:00am">10:00am</option>
                            <option value="13:30pm">13:30pm</option>
                            <option value="17:00pm">17:00pm</option>
                            <option value="20:30pm">20:30pm</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <!--Sends the information to the database-->
                        <button type="submit" class="bookbtn" onclick="isbookingValid()">Request An Appointment</button>
                    </div>

                </fieldset>

            </form>
        </div>
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

                    <p><a href="#">Home</a> <a href="#">About</a> <a href="#">Contact</a> <a href="#">Booking</a> <a href="#">Login</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="assets/bookingVal.js"></script>

</body>

</html>
