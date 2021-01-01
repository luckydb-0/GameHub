//DA RIGUARDARE

/*$(document).ready(function() {

    let copiesNumber = $("#copies-number").val();

    $("#minus").click(function(){

        let copiesNumber = $("#copies-number").val();

        if(copiesNumber > 1) {
            copiesNumber--;
            $("#copies-number").val(copiesNumber);
        }
        if(copiesNumber == 1) {
            $("#minus").attr("disabled", true);
        }
        
    });

    $("#plus").click(function(){
        
        let copiesNumber = $("#copies-number").val();

        copiesNumber++;
        $("#copies-number").val(copiesNumber);
        $("#minus").removeAttr("disabled");        
    });

    $("#copies-number").change(function() {

        let copiesNumber = $("#copies-number").val();
        if(copiesNumber > 1) {
            $("#minus").removeAttr("disabled");
        } else {
            $("#copies-number").val(1);
        }
    });

});*/

$(document).ready(function () {
    //called when key is pressed in textbox
    $("#ccnumber, #cvv").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
        return false;
        };
    });

});
