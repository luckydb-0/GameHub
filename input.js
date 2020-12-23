//DA RIGUARDARE

$(document).ready(function() {

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

});
