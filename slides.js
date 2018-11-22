

var i = 0; // Start Point
var images = []; // Images Array
var time = 3000; // Time Between Switch

// Image List
images[0] = "bilder/karnevaltag.jpg";
images[1] = "bilder/karnevaltag1.jpg";


// Change Image
$(document).ready(changeImg);

function changeImg() {
    document.getElementById("slide").src = images[i];

    // Check If Index Is Under Max
    if (i < images.length - 1) {
        // Add 1 to Index
        i++;
    } else {
        // Reset Back To O
        i = 0;
    }

    // Run function every x seconds
    setTimeout("changeImg()", time);
}

// Run function when page loads
