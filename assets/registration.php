/*
<! –– * Title: Registraion (code modified)
          * Author: Alena Denisova
          * Date: 12/04/2021 
          * Week 9 Advance PHP 
        ––>
Implemented and email and mobile number verification to prevent repeated entries
*/
<?php
    //connecting to the database by providing the host, username, password and database name
	$database = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt138', '200017471', 'adbt138'); 
    if ($database->connect_errno) {
        printf("Connection failed: %s\n", $database->connect_error);
        exit();
    } else {
        //assiging variables that is posted in the database
        $username = $_POST['username'];
        $firstName = $_POST['fname'];
        $lastName = $_POST['sname'];
        $mobile = $_POST['pnum'];
        $email = $_POST['email'];
        //$password = $_POST['psw'];
        $password = password_hash($_POST['psw'],PASSWORD_DEFAULT);
        

        //checking whether there is a replicated input in the database
        //checking the users if it already exist
       $query_username = "SELECT username FROM registration WHERE username = '$username'";
       $res_username = mysqli_query($database, $query_username);
        
       $query_mobile = "SELECT phone_no FROM registration WHERE phone_no = '$mobile'";
       $res_mobile = mysqli_query($database, $query_mobile);
        
       $query_email = "SELECT email FROM registration WHERE email = '$email'";
       $res_email = mysqli_query($database, $query_email);

        // prevent the user from sumbiting the data
        if (mysqli_num_rows($res_username)> 0){
            echo "<script language='javascript'>
                    alert('Input Error. Username provided already taken.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php';
                    </script>";
        }
        //if mobile already exsit prevent user from submitting
       else if (mysqli_num_rows($res_mobile) > 0){
            echo "<script language='javascript'>
                    alert('Input Error. Mobile number already exists. Please try again.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php';
                    </script>";
        }
        //if email already exist prevent user from submiting
        else if (mysqli_num_rows($res_email) > 0){
            echo "<script language='javascript'>
                    alert('Input Error. Email provided is already in the system. Please try again.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php';
                    </script>";
        }
        
        // if the username does not exist then...
        else {
            // insert values from the input fields to the database
            //username, fName, sname, phone_no, email, pword = names of columns you created in your database
            mysqli_query($database, "INSERT INTO registration (username, fname, sname, phone_no, email, pword)
            VALUES ('$username', '$firstName', '$lastName', '$mobile', '$email', '$password')")
                
            or die(mysqli_error($database)); // cancel if there is an error

            // then redirect the user to the same page and log in (change to appropriate URL)
            echo "<script language='javascript'>
                    alert('Registered successfully!')
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/contact.php ';
                    </script>";
        }
    }
?>
