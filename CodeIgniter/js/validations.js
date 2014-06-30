function clearTextBoxes()
{
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("message").value = "";
}

function checkEmail() 
{

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        //alert('Please provide a valid email address');
        email.focus;
        return false;
    }
}

function checkPhone() 
{

    var phone = document.getElementById('phone');
    var filter = /^([0-9]{10})$/;

    if (!filter.test(phone.value)) {
        //alert('Please provide a valid email address');
        phone.focus;
        return false;
    }
}



var nameField = document.getElementById("name");
var emailField = document.getElementById("email");
var phoneField = document.getElementById("phone");

nameField.onblur = function() {
	if (nameField.value == "") {
			document.getElementById("errorMessageName").innerHTML = "Please provide a Name!";
			// to STOP the form from submitting
			return false;
		} 
                
                    else {
			// reset and allow the form to submit
			document.getElementById("errorMessageName").innerHTML = "";
			return true;
		}
};

phoneField.oninput = function() {
	if (phoneField.value == "") {
			document.getElementById("errorMessagePhone").innerHTML = "Please provide a Phone Number!";
			// to STOP the form from submitting
			return false;
		} 
                else if(checkPhone() == false){
                    document.getElementById("errorMessagePhone").innerHTML = "Please provide a valid Phone Number!";
			// to STOP the form from submitting
			return false;
                }  
                else {
			// reset and allow the form to submit
			document.getElementById("errorMessagePhone").innerHTML = "";
			return true;
		}
};

emailField.oninput = function() {
	if (emailField.value == "") {
			document.getElementById("errorMessage").innerHTML = "Please provide an email address!";
			// to STOP the form from submitting
			return false;
		} 
                else if(checkEmail() == false){
                    document.getElementById("errorMessage").innerHTML = "Please provide a valid email address!";
			// to STOP the form from submitting
			return false;
                } 
                    else {
			// reset and allow the form to submit
			document.getElementById("errorMessage").innerHTML = "";
			return true;
		}
};


