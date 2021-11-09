<?php
  
	$conn = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt138', '200017471', 'adbt138'); 
    if ($conn->connect_errno) {
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    } else {
     //assigning variables that is to be posted in the database
        $reference = $_POST['reference'];
        $type = $_POST['photo_type'];
        $theme = $_POST['theme'];
        $date = $_POST['date'];
        $time = $_POST['time'];


        //query to show the date and time
        $query_day = "SELECT day,time FROM booking WHERE day = '$date' AND time = '$time'";
        //execute the query
        $res_day = mysqli_query($conn, $query_day);

        //if a day and time already exist in the database then prevent users from booking
        if (mysqli_num_rows($res_day) > 0) {
            echo "<script language='javascript'>
                    alert('Oops Something went wrong.....Slot is taken please take another appointment slot.');
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/booking.php';
                    </script>";
        }

        else {
           //insert the data in these provided fields
            mysqli_query($conn, "INSERT INTO booking (reference, type, theme, day, time)
            VALUES ('$reference', '$type', '$theme', '$date', '$time')")
                
            or die(mysqli_error($conn)); 


            echo "<script language='javascript'>
                    alert('Booking is successfully!')
                    window.location.href = 'https://smcse.city.ac.uk/student/adbt138/booking.php ';
                    </script>";
        }
    }
?>
