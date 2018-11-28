$(document).ready(lastUpdated);
function lastUpdated(){
    var x = document.getElementById("lastUpdated");
    var days = x.getDate;
    x.innerHTML = "Senast uppdaterad: " + document.lastModified;

}