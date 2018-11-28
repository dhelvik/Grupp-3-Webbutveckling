$(document).ready(lastUpdated);
function lastUpdated(){
    var x = document.getElementById("lastUpdated");
    x.innerHTML = "Senast uppdaterad:" + document.lastModified;
}