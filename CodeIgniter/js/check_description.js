/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//window.onload = function() {
    //Set the click function to the change event of dropdown
    
    
function checkEmail() 
{

    var descriptionTextArea = document.getElementById("advertisement_Description");
    var descriptionText = descriptionTextArea.value;
    
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var words = descriptionText.split(" ");
    //console.log("Select zzzzzzzzzzzz");
    var word;
    for (word in words) {
       if (filter.test(words[word])) {
        //alert('Please provide a valid email address');
        descriptionTextArea.focus;
        console.log("Select zzzzzzzzzzzz");
        return false;
    }
    console.log(words[word]);
    }
    
}

function checkPhone() 
{

    var descriptionTextArea = document.getElementById("advertisement_Description");
    var descriptionText = descriptionTextArea.value;
    
    var filter = /^([0-9]{10})$/;

    var words = descriptionText.split(" ");
    //console.log("Select zzzzzzzzzzzz");
    var word;
    for (word in words) {
       if (filter.test(words[word])) {
        //alert('Please provide a valid email address');
        descriptionTextArea.focus;
        console.log("Select zzzzzzzzzzzz");
        return false;
    }
    console.log(words[word]);
    }
    
}
    
    var descriptionTextArea = document.getElementById("advertisement_Description");

    descriptionTextArea.onblur = function() {
	
        var descriptionText = descriptionTextArea.value;
        
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/rules_controller/check_rule',
            async: false,
            type: 'POST',
            data: ({'description_text': descriptionText}),
            //data: {'location_id': selectedLocation},
            success: function(result) {
                $('#description_error').html(result);
                //descriptionTextArea.focus();
            }
        });
        
        
         if(checkEmail() == false){
                    document.getElementById("errorMessage").innerHTML = "Cannot include email in the description !";
			// to STOP the form from submitting
                        descriptionTextArea.focus();
			return false;
                } 
         if(checkPhone() == false){
                    document.getElementById("errorMessagePhone").innerHTML = "Cannot include contact number in the description !";
			// to STOP the form from submitting
                        descriptionTextArea.focus();
			return false;
                }        
        
};

descriptionTextArea.oninput = function() {
    document.getElementById("errorMessage").innerHTML = "";
    document.getElementById("errorMessagePhone").innerHTML = "";
    document.getElementById("description_error").innerHTML = "";
};




/*var priceTextArea = document.getElementById("advertisement_Price");

    priceTextArea.onblur = function() {
	
        var descriptionText = descriptionTextArea.value;
        
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/rules_controller/check_rule',
            async: false,
            type: 'POST',
            data: ({'description_text': descriptionText}),
            //data: {'location_id': selectedLocation},
            success: function(result) {
                $('#description_error').html(result);
            }
        });
        
};*/

//}

