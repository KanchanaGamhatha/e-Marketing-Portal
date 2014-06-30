
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

var dropdownLocation = document.getElementById("location_id");

dropdownLocation.onclick = function() {
    var dropdown_location_value = dropdownLocation.options[dropdownLocation.selectedIndex].value;
    //console.log("Select zzzzzzzzzzzz");
    $.ajax({
        url: 'http://localhost/CodeIgniter/index.php/account_settings_controller/loadCityDropdown',
        async: false,
        type: 'POST',
        data: ({'dropdown_location_value': dropdown_location_value}),
        //data: {'location_id': selectedLocation},
        success: function(result) {
            $('#city_dropdown').html(result);
            //descriptionTextArea.focus();
        }
    });
}

var nameField = document.getElementById("name");

var phoneField = document.getElementById("phone");

var currnetPasWordField = document.getElementById("currnetPasWord");
var newPasswordField = document.getElementById("newPassword");
var confirmPasswordField = document.getElementById("confirmPassword");
var currentActualPasswordField = document.getElementById("currentActualPassword");

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

nameField.oninput = function() {
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
    else if (checkPhone() == false) {
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


currnetPasWordField.onblur = function() {
    if (currnetPasWordField.value == "") {
        document.getElementById("errorMessageCurrentPW").innerHTML = "Please provide a current password!";
        // to STOP the form from submitting
        return false;
    }
    else if (currnetPasWordField.value != currentActualPasswordField.value) {
        document.getElementById("errorMessageCurrentPW").innerHTML = "Current Password incorrect!";
        
        // to STOP the form from submitting
        return false;
    }
    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageCurrentPW").innerHTML = "";
        return true;
    }
};

currnetPasWordField.oninput = function() {
    if (currnetPasWordField.value == "") {
        document.getElementById("errorMessageCurrentPW").innerHTML = "Please provide a current password!";
        // to STOP the form from submitting
        return false;
    }

    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageCurrentPW").innerHTML = "";
        return true;
    }
};

newPasswordField.oninput = function() {
    if (newPasswordField.value == "") {
        document.getElementById("errorMessageNewPW").innerHTML = "Please provide a new password!";
        // to STOP the form from submitting
        return false;
    }
    else if (newPasswordField.value.length < 4) {
        document.getElementById("errorMessageNewPW").innerHTML = "Please provide a new password of 4 characters!";
        // to STOP the form from submitting
        return false;
    }
    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageNewPW").innerHTML = "";
        return true;
    }
};

newPasswordField.onblur = function() {
    if (newPasswordField.value == "") {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a confirm password!";
        // to STOP the form from submitting
        return false;
    }
    else if (newPasswordField.value.length < 4) {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a confirm password of 4 characters!";
        // to STOP the form from submitting
        return false;
    }
    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageConfirmtPW").innerHTML = "";
        return true;
    }
};

confirmPasswordField.oninput = function() {
    if (confirmPasswordField.value == "") {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a confirm password!";
        // to STOP the form from submitting
        return false;
    }
    else if (confirmPasswordField.value.length < 4) {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a confirm password of 4 characters!";
        // to STOP the form from submitting
        return false;
    }
    else if (confirmPasswordField.value != newPasswordField.value) {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Confirm password does not match!";
        // to STOP the form from submitting
        return false;
    }
    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageConfirmtPW").innerHTML = "";
        return true;
    }
};

confirmPasswordField.onblur = function() {
    if (confirmPasswordField.value == "") {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a new password!";
        // to STOP the form from submitting
        return false;
    }
    else if (confirmPasswordField.value.length < 4) {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Please provide a new password of 4 characters!";
        // to STOP the form from submitting
        return false;
    }
    else if (confirmPasswordField.value != newPasswordField.value) {
        document.getElementById("errorMessageConfirmtPW").innerHTML = "Confirm password does not match!";
        // to STOP the form from submitting
        return false;
    }
    else {
        // reset and allow the form to submit
        document.getElementById("errorMessageConfirmtPW").innerHTML = "";
        return true;
    }
};