window.onload = function() {
    //Set the click function to the change event of dropdown
    var dropdownClick = document.getElementById("dropdown_category");
    dropdownClick.onclick = function() {
        setValues();//call the set value function
    }
    
    var negotiableCheckBox = document.getElementById("negotiable");
    negotiableCheckBox.onclick = function() {
        if(negotiableCheckBox.checked == true)
        {
            var advertisement_Price = document.getElementById("advertisement_Price");
            advertisement_Price.value = "0";
        }
        if(negotiableCheckBox.checked == false)
        {
            var advertisement_Price = document.getElementById("advertisement_Price");
            advertisement_Price.value = "";
        }
        
    }
}


function setValues() {

    var dropdown_category = document.getElementById("dropdown_category");//select the dropdown advertisment form view
    var dropdown_category_value = dropdown_category.options[dropdown_category.selectedIndex].value;//select the value from the dropdown
    var dropdown_category_text = dropdown_category.options[dropdown_category.selectedIndex].text;

    if (dropdown_category_value == 1)//check the category id to get relevernt form from sever
    {
        var div = document.getElementById("newcatogory");//new form is place this div

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {                                    //check browser compatibility
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadVehicalForm', true);//Call to the advertisment controler function
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {
                
                div.innerHTML = request.responseText;//set the value recived from the srver on the advertisment form view (div id = newcatogory)

            }
        }
        request.send();


    }
    else if (dropdown_category_value == 2)
    {
        var div = document.getElementById("newcatogory");

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadPropertyForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {
                
                div.innerHTML = request.responseText;

            }
        }
        request.send();


    }
    else if (dropdown_category_value == 3)
    {
        var div = document.getElementById("newcatogory");
        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadElectronicForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                div.innerHTML = request.responseText;

            }
        }
        request.send();
    }
    else if (dropdown_category_value == 4)
    {
        var div = document.getElementById("newcatogory");

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadHomeAndPersonalForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                div.innerHTML = request.responseText;

            }
        }
        request.send();
    }

    else {
        var div = document.getElementById("newcatogory");
        div.innerHTML = "Publish a general Ad";

    }

}

