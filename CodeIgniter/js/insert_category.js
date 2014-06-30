//Create function to set values
window.onload = function() {
    //Set the click function to the change event of dropdown
    var dropdownClick = document.getElementById("dropdown_category");
    dropdownClick.onclick = function() {
        setValues();//call the set value function
    }
    
    var negotiableCheckBox = document.getElementById("negotiable");
    negotiableCheckBox.onclick = function() {
        //console.log("Select zzzzzzzzzzzz");
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

    var dropdown_category = document.getElementById("dropdown_category");
    var dropdown_category_value = dropdown_category.options[dropdown_category.selectedIndex].value;
    var dropdown_category_text = dropdown_category.options[dropdown_category.selectedIndex].text;

    if (dropdown_category_value == 1)
    {
        var div = document.getElementById("newcatogory");

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadVehicalForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                //document.writeln(request.responseText);
                //console.log("the inner HTML is",div.innerHTML = request.responseText);
                div.innerHTML = request.responseText;

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

                //document.writeln(request.responseText);
                //console.log("the inner HTML is",div.innerHTML = request.responseText);
                div.innerHTML = request.responseText;

            }
        }
        request.send();


    }
    else if (dropdown_category_value == 3)
    {
        var div = document.getElementById("newcatogory");
        //div.innerHTML ="Hello World";

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadElectronicForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                //document.writeln(request.responseText);
                //console.log("the inner HTML is",div.innerHTML = request.responseText);
                div.innerHTML = request.responseText;

            }
        }
        request.send();
    }
    else if (dropdown_category_value == 4)
    {
        var div = document.getElementById("newcatogory");
        //div.innerHTML ="Hello World";

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/advertisement_Controller/loadHomeAndPersonalForm', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                //document.writeln(request.responseText);
                //console.log("the inner HTML is",div.innerHTML = request.responseText);
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

