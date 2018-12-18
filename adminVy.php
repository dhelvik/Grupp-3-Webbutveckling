<?php
session_start();?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >
  
<body>
    <?php 
    include("includes/header.php");
    include("includes/nav.php");
    ?>
    <div class="container" width="80%">
   		<h2 align="center">Adminverktyg för Karnevalister</h2>
   		<div class="form-group">
    		<div class="input-group">
     			<span class="input-group-addon">Sök</span>
     			<input type="text" name="search_text" id="search_text" placeholder="Namn, mail eller sektion" class="form-control" />
    		</div>
  		</div>
    	<div class="table-responsive">
   			<table id="example" class="table table bordered">
   			</table>
   		</div>
    </div>
    <?php
	include("includes/footer.php"); 
	?>
</body>
</html>
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
			$('#example').append('<tr><th>Mail</th><th>firstName</th><th>lastName</th><th>sectionName</th><th>delete</th><th>edit</th></tr>');
			result.forEach(populateListItem);
		},
		error : function(result) {
			alert('hej');
		}
	});
}
function populateListItem(item) {
	$('#example tbody').append(
			'<tr><td>'+item.mail+'</td><td>'+item.firstName+'</td>'
			+'<td>'+item.lastName+'</td><td>'+item.sectionName+'</td>'
			+'<td><button type="button" name="delete_btn" data-mail3="'+item.mail+'" class="btn btn-xs btn-danger btn_delete">x</button></td>'
			+'<td><button type="button" class="editbtn">Edit</button></td></tr>');
}
function editRow(){
	$(this).parent().siblings().attr("contenteditable", "true");
}
$(document).keypress(function(e){
    if(e.which == 13) {
    	var search = $('#search_text').val();
    	alert(search); 
        fetchResult(search);
    }
})
$(document).on('click', '.editbtn', editRow);
$(document).ready(fetchResult());
// $(document).ready(function(){
// 	 fetchResult();

// 	 $('#search_text').keyup(function(){
// 		  var search = $(this).val();
		  
// 		  if(search != '')
// 		  {
// 		   fetchResult(search);
// 		  }
// 		  else
// 		  {
// 		   fetchResult();
// 		  }
// 		 });

// });  		

</script>