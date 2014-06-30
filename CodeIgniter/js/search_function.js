/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function() {
    //Set the click function to the change event of dropdown
    var dropdownCategory = document.getElementById("catogory_id");
    var dropdownLocation = document.getElementById("location_id");
    
    dropdownCategory.onchange = function() {
        //searchCategory();//call the set value function
        var selectedCategory = dropdownCategory.options[dropdownCategory.selectedIndex].value;
        var selectedLocation = dropdownLocation.options[dropdownLocation.selectedIndex].value;
        
        //alert(selected);
        $.ajax({
                       url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax_category',
                       async: false,
                       type: 'POST',
                       data: ({'catogory_id': selectedCategory}),
                       //data: {'location_id': selectedLocation},
                       success: function(result){
                         $('#search_result').html(result);
                       }
                     });
    }
    
    dropdownLocation.onchange = function() {
        //searchCategory();//call the set value function
        var selectedCategory = dropdownCategory.options[dropdownCategory.selectedIndex].value;
        var selectedLocation = dropdownLocation.options[dropdownLocation.selectedIndex].value;
        
        //alert(selectedLocation);
        $.ajax({
                       url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax_location',
                       async: false,
                       type: 'POST',
                       //data: ({'catogory_id': selectedCategory}),
                       data: ({'location_id': selectedLocation}),
                       success: function(result){
                         $('#search_result').html(result);
                       }
                     });
    }
    
}

/*function getData(id)
    {
            $.ajax({
                       url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax',
                       async: false,
                       type: "POST",
                       data: "catogory_id =" + id,
                       dataType: "html",
                       success: function(result){
                         $("#search_result").html(result);
                       }
                     });
    };

function ajax_gallery() {
    $('.show-gallery').click(function() {
        $.ajax({
            url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax',
            async: false,
            type: "POST",
            data: "type=gallery",
            dataType: "html",
            success: function(data) {
                $('#ajax-content-container').html(data);
            }
        })
    });
}

function searchCategory() {

    var dropdown_category = document.getElementById("catogory_id");
    var dropdown_category_value = dropdown_category.options[dropdown_category.selectedIndex].value;
    //var dropdown_category_text = dropdown_category.options[dropdown_category.selectedIndex].text;

   
        var div = document.getElementById("search_result");

        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXobject("Microsoft.XLHTTP");
        }
        request.open('GET', 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax', true);
        request.onreadystatechange = function() {

            if ((request.readyState === 4) && (request.status === 200)) {

                //document.writeln(request.responseText);
                //console.log("the inner HTML is",div.innerHTML = request.responseText);
                div.innerHTML = request.responseText;

            }
        }
        request.send();
    

}*/
