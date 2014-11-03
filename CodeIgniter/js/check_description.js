/*
 * checkEmail which check for a email in a given text by splitting it in to words
 * and returns false if a email is found on the text
 */    
function checkEmail(textValue) 
{
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var words = textValue.split(/[\s,]+/);
    var word;
    for (word in words) 
    {
       if (filter.test(words[word])) 
       {
            return false;
        }
        console.log(words[word]);
    }
    
}

/*
 * checkEmail which check for a phone number in a given text by splitting it in to words
 * and returns false if a phone number is found on the text
 */
function checkPhone(textValue) 
{
    var filter = /^([0-9]{9,11})$/;

    var words = textValue.split(/[\s,]+/);
    var word;
    for (word in words) {
       if (filter.test(words[word])) 
       {
            return false;
       }
    console.log(words[word]);
    }
    
}

/*
 * checkEmail which check for a url in a given text by splitting it in to words
 * and returns false if a url is found on the text
 */

function checkURL(textValue) 
{
    var filter = /(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;

    var words = textValue.split(/[\s,]+/);
    var word;
    for (word in words) {
       if (filter.test(words[word])) 
       {
            return false;
       }
    console.log(words[word]);
    }
    
}
    
    var descriptionTextArea = document.getElementById("advertisement_Description");

    descriptionTextArea.onblur = function() 
    {
	
        var descriptionText = descriptionTextArea.value;
        //Calling php function through ajax to check whether any unallowed text in the advertisement description
        
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/ad_approval_controller/check_rule',
            async: false,
            type: 'POST',
            data: ({'description_text': descriptionText}),
            success: function(result) {
                $('#description_error').html(result);
                
            }
        });
        
        //Check whether a email address address present in advertiesement description
         if(checkEmail(descriptionText) == false)
         {
            document.getElementById("errorMessage").innerHTML = "Cannot include email in the description !";
            descriptionTextArea.focus();
         } 
         //Check whether a phone number address present in advertiesement description
         if(checkPhone(descriptionText) == false)
         {
            document.getElementById("errorMessagePhone").innerHTML = "Cannot include contact number in the description !";
            descriptionTextArea.focus();
         }
         //Check whether a url address present in advertiesement description
         if(checkURL(descriptionText) == false)
         {
             document.getElementById("errorMessageURL").innerHTML = "Cannot include a url in the description !";
             descriptionTextArea.focus();
         }
         document.getElementById("description_rules").className = "hidden";
        
};

descriptionTextArea.oninput = function() 
{
    document.getElementById("errorMessage").innerHTML = "";
    document.getElementById("errorMessagePhone").innerHTML = "";
    document.getElementById("description_error").innerHTML = "";
    document.getElementById("errorMessageURL").innerHTML = "";
    document.getElementById("description_rules").className = "";
    
    
};

var titleTextBox = document.getElementById("advertisement_title");

    titleTextBox.onblur = function() 
    {
        var titleText = titleTextBox.value;
        //Calling php function through ajax to check whether any unallowed text in the advertisement title
        
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/ad_approval_controller/check_rule',
            async: false,
            type: 'POST',
            data: ({'description_text': titleText}),
            success: function(result) {
                $('#title_error').html(result);
                
            }
        });
        
        //Check whether a email address present in advertiesement title
         if(checkEmail(titleText) == false)
         {
            document.getElementById("title_error_message").innerHTML = "Cannot include email in the title !";
            titleTextBox.focus();
         } 
         //Check whether a phone number address present in advertiesement title
         if(checkPhone(titleText) == false)
         {
            document.getElementById("title_error_message_phone").innerHTML = "Cannot include contact number in the title !";
            titleTextBox.focus();
         }
         //Check whether a url address present in advertiesement title
         if(checkURL(titleText) == false)
         {
             document.getElementById("title_error_message_URL").innerHTML = "Cannot include a url in the title !";
             titleTextBox.focus();
         }
         document.getElementById("title_rules").className = "hidden";
    };
    
    titleTextBox.oninput = function() 
    {
        document.getElementById("title_error").innerHTML = "";
        document.getElementById("title_error_message").innerHTML = "";
        document.getElementById("title_error_message_phone").innerHTML = "";
        document.getElementById("title_error_message_URL").innerHTML = "";
        document.getElementById("title_rules").className = "";


    };