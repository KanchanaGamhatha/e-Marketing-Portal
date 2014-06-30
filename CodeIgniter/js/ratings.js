/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

    $('.exemple2').jRating({
        type: 'small',
        length: 40,
        decimalLength: 1,
    });

    $('.exemple3').jRating({
        step: true,
        length: 20
    });

    $('.exemple4').jRating({
        isDisabled: true

    });

    $('.exemple5').jRating({
        length: 10,
        decimalLength: 1,
        onSuccess: function() {
            alert('Success : your rate has been saved :)');
        },
        onError: function() {
            alert('Error : please retry');
        }
    });

    $(".exemple6").jRating({
        length: 10,
        decimalLength: 1,
        showRateInfo: false
    });

    $('.exemple7').jRating({
        step: true,
        length: 20,
        canRateAgain: true,
        nbRates: 3
    });
});

$("#my-button").click(function() {
    $("#my-modal").modal();
});
$("#my-button2").click(function() {
    $("#my-modal").modal();
});
$("#rate-button").click(function() {
    $("#rate-modal").modal();
});
$("#report-button").click(function() {
    $("#report-modal").modal();
});
$("#sendemail-button").click(function() {
    $("#sendemail-modal").modal();
});
$("#share-button").click(function() {
    $("#share-modal").modal();
});
$("#picture-button").click(function() {
    $("#picture-modal").modal();
});