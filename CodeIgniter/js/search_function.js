/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function() {
    //Set the click function to the change event of dropdown
    var dropdownCategory = document.getElementById("catogory_id");
    var dropdownLocation = document.getElementById("location_id");
    var dropdownAdFilter = document.getElementById("ad_filter");
    var dropdownAdType = document.getElementById("ad_type");
    var inputSearch = document.getElementById("search");
    
    dropdownCategory.onchange = function() {
        var selectedCategory = dropdownCategory.options[dropdownCategory.selectedIndex].value;
        var selectedLocation = dropdownLocation.options[dropdownLocation.selectedIndex].value;

        $.ajax({
                       url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax_category',
                       async: false,
                       type: 'POST',
                       //data: ({data: jsonString}),
                       data: ({'catogory_id': selectedCategory}),
                       success: function(result){
                         $('#search_result').html(result);
                       }
                     });
    }
    
    dropdownLocation.onchange = function() {
        var selectedCategory = dropdownCategory.options[dropdownCategory.selectedIndex].value;
        var selectedLocation = dropdownLocation.options[dropdownLocation.selectedIndex].value;

        $.ajax({
                       url: 'http://localhost/CodeIgniter/index.php/search_controller/search_ajax_location',
                       async: false,
                       type: 'POST',
                       data: {'location_id': selectedLocation},
                       //data: ({data: jsonString}),
                       success: function(result){
                         $('#search_result').html(result);
                       }
                     });
    }
    
    
    
}
