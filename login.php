/*
<! –– * Title: Login (code modified)
          * Author: Alena Denisova
          * Date: 12/04/2021 
          * Week 9 Advance PHP 
        ––>
I have based my login funcitionality from lab 8, week 9 and modified the login validate the encryption password in the database
*/
<?php
    if(!isset($_SESSION)) {
        session_start(); // start the session if it still does not exist
    }

   // connect to the database
	$conn = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt138', '200017471', 'adbt138'); 
    if ($conn->connect_errno) {
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    } else {
        // declare variables containing values from the input fields of the login form
        //the values come from the *name* attributes of the input fields
        $userLogin = $_POST['username_login'];
        $userPass = $_POST['password_login'];

        // select the username and password fields which match the data entered in the input fields
        $query = "SELECT username, pword FROM registration WHERE username = '$userLogin'";
        // execute the query
        
        $result = $conn->query($query);
        if($row = mysqli_fetch_assoc($result)){
            $verify = password_verify($userPass,$row["pword"]);
            if($verify == false){
                echo "<script language='javascript'>
                    alert('Please enter valid credentials.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php';
                  </script>";
                }else if ($verify== true){
                $_SESSION['username'] = $userLogin;
                header("Location: booking.php");
                }   
            }else {
            echo "<script language='javascript'>
                    alert('Please enter valid credentials.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php';
                  </script>"; 
        }
    }
?>