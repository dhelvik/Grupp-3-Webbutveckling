
var i = 3; // Start Point
var images = new Array();
var time = 3000; // Time Between Switch

$(document).ready(getImgPath);
function getImgPath(){
	$.ajax({ 
		type : "POST",
		url : "application/requestHandler.php",
		data : {
			ACTION : "getImgPath",	
		},
		success : function(result) {
			console.log(result)
			images = JSON.parse(result);
			changeImg();
		}
	});
}

// Change Image
function changeImg() {
    document.getElementById("slide1").src = "bilder/slide/"+images[i]+"";
    document.getElementById("slide2").src = "bilder/slide/"+images[i+1]+"";
    document.getElementById("slide3").src = "bilder/slide/"+images[i+2]+"";
    // Check If Index Is Under Max
    if (i < 21) {
        // Add 1 to Index
        i+=3;
    } else {
        // Reset Back To O
        i = 3;
    }

    // Run function every x seconds
    setTimeout("changeImg()", time);
}

// Run function when page loads
