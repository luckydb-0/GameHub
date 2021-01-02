$(document).ready(function () {

    $('[data-toggle="popover"]').popover();
    
    //called when key is pressed in textbox
    $("#ccnumber, #cvv, #postCode").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
        return false;
        };
    });

    $("#addCardBtn").click(function() {

        if($("#addCard").hasClass("hidden")) {
            $("#addCard").removeClass("hidden").slideDown();
        } else {
            $("#addCard").addClass("hidden").slideUp();
        }
    })
    
});