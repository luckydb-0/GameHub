$(document).ready(function () {

    $('[data-toggle="popover"]').popover();
    
    //called when key is pressed in textbox
    $("#ccnumber, #cvv, #postCode, #piva, #phonenumber").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
        };
    });
    
});