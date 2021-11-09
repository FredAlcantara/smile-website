<?php

require_once "registration.php";
?>
<form method="post" action="registration.php" id="register-form">
    <fieldset>
        <div class="register container bg-light">
            <h2 class=display-4>Register</h2>
            <p>To book an appointment with us you must have an account. <a href="#" data-toggle="modal" data-target="#login">Already a member?</a></p>

            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter a username" maxlength="15">
                <small id="username-tag">Invalid Input Error</small>
            </div>

            <div>
                <label for="fname">First Name:</label>
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your first name" maxlength="30" style="text-transform: capitalize">
                <small id="fname-tag">Invalid Input Error</small>
            </div>

            <div>
                <label for="sname">Surname:</label>
                <input type="text" name="sname" class="form-control" id="sname" placeholder="Enter your surname" maxlength="30" style="text-transform: capitalize">
                <small id="sname-tag">Invalid Input Error</small>
            </div>

            <div>
                <label for="pnum">Phone Number:</label>
                <input type="tel" name="pnum" class="form-control" id="pnumber" placeholder="Enter your phone number" minlength="11" maxlength="11">
                <small id="pnum-tag">Invalid Input Error</small>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="e.g John@example.com" maxlength="30">
                <small id="email-tag">Invalid Input Error</small>
            </div>

            <div>
                <label for="psw">Password:</label>
                <input type="password" name="psw" class="form-control" id="psw" placeholder="Enter a password" maxlength="30">
                <small id="psw-tag">Invalid Input Error</small>
            </div>

            <div>

                <label for="psw-confirmation">Password Confirmation:</label>
                <input type="password" class="form-control" id="psw-confirmation" placeholder="re-enter password" maxlength="30">
                <small id="psw-confirmation-tag">Invalid Input Error</small>
            </div>
            <div>
                <button type="submit" onclick="isValid()" class="registerbtn col-md-12">Register</button>
            </div>
        </div>
    </fieldset>
</form>
