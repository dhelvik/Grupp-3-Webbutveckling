<?php
session_start();


?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
    <script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	rel="stylesheet">

<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    ?>
    
    <div class="container" width="80%">
		<h2 align="center">Adminverktyg för Karnevalister</h2>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">Sök</span> <input type="text"
					name="search_text" id="search_text"
					placeholder="Namn, mail eller sektion" class="form-control" />
			</div>
		</div>
		<div class="table-responsive">
			<table id="example" class="table table bordered">
			</table>
		</div>
		<button id="showMailArea" class="btn-info" type="button">Skicka Mail</button>
		<div id="mailArea" style="display:none;align:center;">
		
		<textarea id="message" rows="5" cols="100"></textarea>
		<button id="sendMail" class="btn-success" type="button" action="sendMail">Skicka</button>
		</div>
				<label id="labelResponse"></label>
		
	</div>
    <?php
    include ("includes/footer.php");
    ?>
</body>
</html>
<script>
	  $("#sendMail").click(function(){
		  var arr = [];
		  $("#example tr:not(:first-child)").each(function(){
			    var mail = $(this).find("td:first").text();
		      	arr.push(mail);
		      	
		  });
		  var message = $('#message').val();
		  
		  $.ajax({
			  
				type : "POST",
				url : "application/adminRequestHandler.php",
				data : {
					ACTION : "sendAdminEmail",
					message : message,
					emails : arr,	
				},
				success : function(result) {
					$('#labelResponse').empty();
					$('#labelResponse').append('Mail skickat!');
					$('textarea').val('');
				},
				error : function(result) {
					$('#labelResponse').empty();
					$('#labelResponse').append('Något gick fel');
					
				}
			});
	  });

</script>
<script>
	  $("#showMailArea").click(function(){
			$('#mailArea').toggle();
			  
		if ($(this).html() == 'Skicka Mail') {
			
		    	$(this).addClass('btn-danger');
		    	$(this).removeClass('btn-info');
		    	$('textarea').val('');
		    	
		}else {

			
			$(this).removeClass('btn-danger');
	    	$(this).addClass('btn-info');
		}
		$(this).html($(this).html() == 'Skicka Mail' ? 'Avbryt' : 'Skicka Mail')
		
	  });

</script>
<script>
function fetchResult(search) {
	$.ajax({
		type : "POST",
		url : "application/adminRequestHandler.php",
		data : {
			ACTION : "getKarnevelister",
			search : search	
		},
		success : function(result) {
			$('#example').empty();
			$('#example').append('<tr><th>Mail</th><th>Förnamn</th><th>Efternamn</th><th>Telefonnummer</th><th>Sektion</th><th>Ändra</th><th>Ta bort</th></tr>');
			result.forEach(populateListItem);
		},
		error : function(result) {
			alert('hej');
		}
	});
}
function populateListItem(item) {
	$('#example tbody').append(
			'<tr><td>'+item.mail+'</td><td class="editable">'+item.firstName+'</td>'
			+'<td class="editable">'+item.lastName+'</td><td class="editable">'+item.phoneNumber+'</td><td><select id="'+item.sectionName.toUpperCase()+'"disabled="true"><option value="ADMINSTERIT">Adminsterit</option><option value="BILJONSEN">Biljonsen</option><option value="BLÄDDERIET">Blädderiet</option><option value="DANSEN">Dansen</option></select></td>'
			+'<td><button id="editbtn" type="button" class="editbtn btn btn-xs btn-info">Edit</button></td>'
			+'<td><button type="button" name="delete_btn" data-mail3="'+item.mail+'" class="btn btn-xs btn-danger btn_delete">x</button></td></tr>');
	$("#"+item.sectionName.toUpperCase()).val(item.sectionName.toUpperCase());
	
}
function editRow(){
    if ($(this).html() == 'Edit') {
    	$(this).removeClass('btn-info');
    	$(this).addClass('btn-success');
        $(this).parent().siblings().find('select').prop("disabled", false);
    	
		$(this).parent().siblings(".editable").attr("contenteditable", "true");
    }else {	
        $(this).parent().siblings().find('select').prop("disabled", true);
        
		$(this).addClass('btn-info');
        $(this).removeClass('btn-success');
       	$(this).parent().siblings().attr("contenteditable", "false");
        var mail = $(this).parent().siblings().filter(":first").text();
        var firstName = $(this).parent().siblings().filter(":nth(1)").text();
        var lastName = $(this).parent().siblings().filter(":nth(2)").text();
        var phoneNumber = $(this).parent().siblings().filter(":nth(3)").text();
        var sectionName = $(this).parent().siblings().find('select').val();
        updateKarnevalist(firstName, lastName, mail, sectionName, phoneNumber);
        	
    }
	$(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
    
}
function deleteRow(){
	 var mail = $(this).parent().siblings().filter(":first").text();
	 deleteKarnevalist(mail);
	 
}
function updateKarnevalist(firstName, lastName, mail, sectionName, phoneNumber) {
	
	$.ajax({
		type : "POST",
		url : "application/adminRequestHandler.php",
		data : {
			ACTION : "updateKarnevalist",
			mail : mail,
			firstName: firstName,
			lastName: lastName,
			sectionName: sectionName,
			phoneNumber: phoneNumber,
		},
		success : function(result) {
		},
		error : function(result) {
			alert('hej');
		}
	});
}
function deleteKarnevalist(mail) {
	var confirmation = confirm("Är du säker på att du vill ta bort Karnevalist?");
	if(confirmation == true){
	$.ajax({
		type : "POST",
		url : "application/adminRequestHandler.php",
		data : {
			ACTION : "deleteKarnevalist",
			mail : mail
			
		},
		success : function(result) {
			alert("Borttaggen");
			fetchResult($('#search_text').val());
		},
		error : function(result) {
			alert('hej');
		}
	});
	} else{
		return;
		}
}
$(document).keypress(function(e){
    if(e.which == 13) {
    	var search = $('#search_text').val();
        fetchResult(search);
    }
})
$(document).on('click', '.btn_delete', deleteRow);
$(document).on('click', '.editbtn', editRow);
$(document).ready(fetchResult());

</script>