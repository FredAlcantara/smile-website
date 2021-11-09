/*
<! –– * Title: Logout
          * Author: Alena Denisova
          * Date: 14/04/2021 
          * Week 9 Advance PHP 
        ––>
*/
<?php
    session_start();
    unset($_SESSION['username']); // disable the username session

    // end the session
    session_destroy();
    header("Location: contact.php"); // redirect back to the form
?>