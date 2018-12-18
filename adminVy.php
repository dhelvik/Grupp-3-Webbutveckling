<?php
session_start();?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
<body>
    <?php 
    include("includes/header.php");
    include("includes/nav.php");
    ?>
    <div class="main">
    <input type="text" name="search" id="search"/>
    
	<div id="result"></div>
		<table id="table"></table>
    </div>
    <?php
	include("includes/footer.php"); 
	?>
</body>
</html>
<script>
function fetchResult() {
	$.ajax({
		type : "POST",
		url : "/Vart den ska",
		data : {
			ACTION : "fetchResult",
			search : "värdet från sökfälet"	
		},
		success : function(result "sätt att det returneras som json på serversidan ex. header('Content-Type: application/json'); finns på guestbook") {
			list = document.getElementById("ID för tabellen där resultatet ska läggas till");
			list.innerHTML = "";
			result.forEach(populateListItem);
		},
		error : function(result) {
			alert('hej');
		}
	});
}
function populateListItem(students) {
	list = document.getElementById("ID för tabellen där resultatet ska läggas till");
	list.innerHTML = list.innerHTML
			+"<tr id='"+student.mail+"'>"
			+"<td>"+ student.mail +"</td>" 
            +"<td class='edit'>"+ student.firstName +"</td>"
            +"<td class='edit'>"+ student.lastName +"</td>"
            +"<td class='edit'>"+ student.sectionName +"</td>"
            +"<td><button class='edit' type='button' value'"+student.mail+"' name='edit_btn'>edit</button></td>";
			+"<td><button class='delete' type='button' name='delete_btn'>x</button></td>";
}
function editRow(){
	$(this).parent().siblings('.edit').attr("contenteditable", "true");
}
$(document).keypress(function(e){
    if(e.which == 13) {
        fetchResult();
    }
})
$(document).on('click', '.edit', editRow);

</script>