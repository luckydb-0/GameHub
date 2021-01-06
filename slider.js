$(document).ready(function() {
    var slider = document.getElementById("priceRange");
    var output = document.getElementById("demo");
    output.innerHTML = (slider.value).concat( "€"); // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = (this.value).concat(" €");
    }

});