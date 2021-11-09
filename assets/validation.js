/*
<! –– * Title: Validation (code modified)
          * Author: Alena Denisova
          * Date: 11/04/2021 
          * Week 7 Building Interactive Websites Using JavaScript
        ––>
I have modified this code by applying different style to clearly indicate that there is an error.
I have provided red border and red error meassage also and alert to display a clear indication of 
error.
*/
function $(id) {
    return document.getElementById(id);
}

var submission = false;

$("register-form").addEventListener("submit", (e) => {
    if (submission == false) {
        e.preventDefault();
        registerchecker(); // check for errors
    } else {

    }
});

$("login-form").addEventListener("submit", (e) => {
    if (submission ==false) {
        e.preventDefault();
        loginForm(); // check for errors
    } else {
        // prevent the preventDefault function  
    }
});

function registerchecker() {
    var namevalidation = /^[A-Za-z]+$/; // validation for only alphabetic input
    var numberValidation = /^[0-9]+$/; // validation for only numric input
    var pass_validation = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,30}$/;

    //validation rule for username, cannot be empty 
    const usernameInput = $("username").value.trim();
    var usernameValid = false;

    if (usernameInput == "") {
        $("username-error").style.display = "block";
        $("username-error").innerHTML = "Please provide a username for your account.*";
        $("username-error").style.color = "orangered";
        $("username").style.border = "3px solid orangered";
        $("username").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("username-error").style.display = "block"; 
        $("username-error").innerHTML = "Username provide is valid."
        $("username-error").style.color = "green";
        $("username").style.border = "3px solid green";
        $("username").style.backgroundColor= "rgba(0,200,0,.1)";
        usernameValid = true; // set boolean variable to true
    }

    //validation rule for first name of the client 
    const fnameInput = $("fname").value.trim();
    var fnameValid = false;

    if (fnameInput == "") {
        $("fname-error").style.display = "block";
        $("fname-error").innerHTML = "Please provide your first name.*"; //when the input box is empty, provide this error message
        $("fname-error").style.color = "orangered";
        $("fname").style.border = "3px solid orangered";
        $("fname").style.backgroundColor= "rgba(200,0,0,.1)";
    } else if (!fnameInput.match(namevalidation)) { //validation checker for no symbol and numerical value
        $("fname-error").style.display = "block";
        $("fname-error").innerHTML = "Invalid input. Please provide only alphabetic values.*"; //when symbols and numerical values is present, provide this error message
        $("fname-error").style.color = "orangered";
        $("fname").style.border = "3px solid orangered";
        $("fname").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("fname-error").style.display = "block";
        $("fname-error").innerHTML = "First name provided is valid.";
        $("fname-error").style.color = "green";
        $("fname").style.border = "3px solid green";
        $("fname").style.backgroundColor= "rgba(0,200,0,.1)";
        fnameValid = true;
    }

    //validation rule for the clients surname
    const surnameInput = $("sname").value.trim();
    var surnameValid = false;

    if (surnameInput == "") {
        $("sname-error").style.display = "block";
        $("sname-error").innerHTML = "Please provide your surname.*"; //when the input box is empty, provide this error message
        $("sname").style.border = "3px solid orangered";
        $("sname").style.backgroundColor= "rgba(200,0,0,.1)";
    } else if (!surnameInput.match(namevalidation)) { //validation checker for no symbol and numerical value
        $("sname-error").style.display = "block";
        $("sname-error").innerHTML = "Invalid input. Please provide only alphabetic values.*"; //when symbols and numerical values is present, provide this error message
        $("sname").style.border = "3px solid orangered";
        $("sname").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("sname-error").style.display = "block";
        $("sname-error").innerHTML = "Surname is valid."
        $("sname-error").style.color = "green";
        $("sname").style.border = "3px solid green";
        $("sname").style.backgroundColor= "rgba(0,200,0,.1)";
        surnameValid = true;
    }

    //validation for phone number 
    const numberInput = $("pnumber").value.trim();
    var numberValid = false;

    if (numberInput == "") {
        $("pnum-error").style.display = "block";
        $("pnum-error").innerHTML = "Please provide your phone number.*";
        $("pnumber").style.border = "3px solid orangered";
        $("pnumber").style.backgroundColor= "rgba(200,0,0,.1)";
    } else if (!numberInput.match(numberValidation)) {
        $("pnum-error").style.display = "block";
        $("pnum-error").innerHTML = "Invalid input. Please provide only numeric values.*"; //when symbols and alphabet values is present, provide this error message
        $("pnumber").style.border = "3px solid orangered";
        $("pnumber").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("pnum-error").style.display = "block";
        $("pnum-error").innerHTML = "Mobile number provided is valid.";
        $("pnum-error").style.color = "green";
        $("pnumber").style.border = "3px solid green";
        $("pnumber").style.backgroundColor= "rgba(0,200,0,.1)";
        numberValid = true;
    }

    // email validation
    const emailInput = $("email").value.trim();
    var emailValid = false;

    if (emailInput == "") {
        $("email-error").style.display = "block";
        $("email-error").innerHTML = "Please provide your email.*";
        $("email").style.border = "3px solid orangered";
        $("email").style.backgroundColor= "rgba(200,0,0,.1)";
        
    } else if ((!emailInput.includes("@") && (!emailInput.includes(".com"))) || (!emailInput.includes("@") || !emailInput.includes(".com"))) {
        // if the value for this field does not include @ and .com, display error message
        $("email-error").style.display = "block";
        $("email-error").innerHTML = "Please enter a valid email. For example, John@example.com*";
        $("email").style.border = "3px solid orangered";
        $("email").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("email-error").style.display = "block";
        $("email-error").style.color = "green";
        $("email-error").innerHTML = "Email provide is valid.";
        $("email").style.border = "3px solid green";
        $("email").style.backgroundColor = "rgba(0,200,0,.1)";
        emailValid = true;
    }

    //validation for user password
    const passwordInput = $("psw").value.trim();
    var passwordValid = false;

    if (passwordInput == "") {
        $("psw-error").style.display = "block";
        $("psw-error").innerHTML = "Please provide a password for your account.*";
        $("psw").style.border = "3px solid orangered";
        $("psw").style.backgroundColor= "rgba(200,0,0,.1)";
    } else if (!passwordInput.match(pass_validation)) {
        $("psw-error").style.display = "block";
        $("psw-error").innerHTML = "Password must contain at least 6 characters long, contains upper- and lower-case letters, numbers, and at least one symbol.*";
        $("psw").style.border = "3px solid orangered";
        $("psw").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        $("psw-error").style.display = "block";
        $("psw-error").style.color = "green";
        $("psw-error").innerHTML = "Password provide is valid.";
        $("psw").style.border = "3px solid green";
        $("psw").style.backgroundColor= "rgba(0,200,0,.1)";
        passwordValid = true;
    }

    //validation for verification of password provided
    const passwordConfirmation = $("psw-confirmation").value.trim();
    var confirmationValid = false;

    if (passwordConfirmation == "") {
        $("psw-confirmation-error").style.display = "block";
        $("psw-confirmation-error").innerHTML = "Please provide the matching password.*";
        $("psw-confirmation").style.border = "3px solid orangered";
        $("psw-confirmation").style.backgroundColor = "rgba(2000,0,0,.1)";
    } else if (passwordConfirmation != passwordInput) {
        $("psw-confirmation-error").style.display = "block";
        $("psw-confirmation-error").innerHTML = "Password provide does not match.Please try again.*";
        $("psw-confirmation").style.border = "3px solid orangered";
        $("psw-confirmation").style.backgroundColor = "rgba(200,0,0,.1)";
    } else {
        $("psw-confirmation-error").style.display = "block";
        $("psw-confirmation-error").style.color = "green";
        $("psw-confirmation-error").innerHTML = "Password provided matches the password given."
        $("psw-confirmation").style.border = "3px solid green";
        $("psw-confirmation").style.backgroundColor = "rgba(0,200,0,.1)";
        confirmationValid = true;
    }

    function isValid() {

        if (usernameValid && fnameValid && surnameValid && numberValid && emailValid && passwordValid && confirmationValid) {
            submission = true;
            //submit form if sumbmission is true
            document.getElementById("register-form").submit();

        } else if (!(usernameValid && fnameValid && surnameValid && numberValid && emailValid && passwordValid && confirmationValid)) {
            alert("Oops!...Something went wrong. Please try again.");
        }
    }
    isValid();
}

    function loginForm(){
        const loginUsernameInput = $("username_login").value.trim();
        
        
        if(loginUsernameInput == ""){
           $("ulogin-error").style.display = "block";
           $("ulogin-error").innerHTML = "Provide your username."        
        } else{
            $("ulogin-error").style.display = "none";
        }
        
        const passwordInput = $("password_login").value.trim();
        if(passwordInput == ""){
            $("plogin-error").style.display = "block";
            $("plogin-error").innerHTML = "Provide your password."
        }else{
            $("plogin-error").style.display = "none";
        }
        
        if(loginUsernameInput !="" && passwordInput !=""){
            submission = true;
            document.getElementById("login-form").submit();
            
        }else if((loginUsernameInput =="")||(passwordInput =="")){
            alert("Oops!...Something went wrong. Please try again.");
        }
    }