function $(id) {
    return document.getElementById(id);
}

var submission = false;
//a event listener which prevent users from submitting when criteria is not met
$("booking").addEventListener("submit", (e) => {
    if (submission == false) {
        e.preventDefault();
        bookingValid(); // check for errors
    } else {

    }
});

function bookingValid() {
 
    const typeInput = $("type").value.trim();
    var typeInputValid = false;
//if the field is blank then show the error message and place a red border
    if (typeInput == "") {
        $("type-error").style.display = "block";
        $("type-error").innerHTML = "Please provide a description.*";
        $("type-error").style.color = "orangered";
        $("type").style.border = "3px solid orangered";
        $("type").style.backgroundColor= "rgba(200,0,0,.1)";
    } else {
        //else make the border green and a valid message
        $("type-error").style.display = "block"; 
        $("type-error").innerHTML = "Looks good."
        $("type-error").style.color = "green";
        $("type").style.border = "3px solid green";
        $("type").style.backgroundColor= "rgba(0,200,0,.1)";
        typeInputValid = true; // set boolean variable to true
    }
    
    const themeInput = $("theme").value.trim();
    var themeValid = false;
    
    if(themeInput==""){
        //if the field is blank then show the error message and place a red border
        $("theme-error").style.display = "block";
        $("theme-error").innerHTML = "Please provide a theme.*";
        $("theme-error").style.color = "orangered";
        $("theme").style.border = "3px solid orangered";
        $("theme").style.backgroundColor= "rgba(200,0,0,.1)";
    }else{
        //else make the border green and a valid message
        $("theme-error").style.display = "block"; 
        $("theme-error").innerHTML = "Looks good."
        $("theme-error").style.color = "green";
        $("theme").style.border = "3px solid green";
        $("theme").style.backgroundColor= "rgba(0,200,0,.1)";
        themeValid = true; // set boolean variable to true
    }

    function isbookingValid() {

        if (typeInputValid && typeInputValid) {
            submission = true;
            //submit form if sumbmission is true
            document.getElementById("booking").submit();

        } else if (!(typeInputValid)) {
            //if the input is invalid then show an alert message to the user
            alert("Oops!...Something went wrong. Please try again.");
        }
    }
    isbookingValid();
}

    