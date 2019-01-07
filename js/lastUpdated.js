$(document).ready(lastUpdated);
function lastUpdated(){
    var x = document.getElementById("lastUpdated");
    var days = x.getDate;
    var dateTime = new Date(document.lastModified);
    var date = dateTime.getDate();
    var year = dateTime.getFullYear();
    var month = dateTime.getMonth()+1;
    x.innerHTML = "Senast uppdaterad: " + date + "/" + month + "-" + year;

}