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
    <div class="main" width="80%">
    <input type="text" name="search" id="search"/>
    
	 <div class="container">
   <br />
   <h2 align="center">Adminverktyg för Karnevalister</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Sök</span>
     <input type="text" name="search_text" id="search_text" placeholder="Namn, mail eller sektion" class="form-control" />
    </div>
   </div>
   <br />
    <div class="table-responsive">
   <table id="example" class="table table bordered">
    <tr>
     <th>Mail</th>
     <th>firstName</th>
     <th>lastName</th>
     <th>sectionName</th>
     
    </tr>
    
    </table>
    
     </div>
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
			search : search,	
		},
		success : function(result) {
			$('#example tbody').empty();

		  	
			   result.forEach(function(item){
				   
					$('#example tbody').append('<tr><td>'+item.mail+'</td><td>'+item.firstName+'</td><td>'+item.lastName+'</td><td>'+item.sectionName+'</td>'+
							'<td><button type="button" name="delete_btn" data-mail3="'+item.mail+'" class="btn btn-xs btn-danger btn_delete">x</button></td>'+
							'<td><button type="button" class="editbtn">Edit</button></td></tr>')
				});
		},
		error : function(result) {
			alert('hej');
		}
	});
}

function populateListItem(student) {
	$('#example tbody').append('<tr><td>'+student.mail+'</td><td>'+student.firstName+'</td><td>'+student.lastName+'</td><td>'+student.sectionName+'</td>'+
			'<td><button type="button" name="delete_btn" data-mail3="'+student.mail+'" class="btn btn-xs btn-danger btn_delete">x</button></td>'+
			'<td><button type="button" class="editbtn">Edit</button></td></tr>');
}
function editRow(){
	$(this).parent().siblings('.editbtn').attr("contenteditable", "true");
}
$(document).keypress(function(e){
    if(e.which == 13) {
        fetchResult();
    }
})
$(document).on('click', '.edit', editRow);
$(document).ready(function(){
	 fetchResult();

	 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  
		  if(search != '')
		  {
		   fetchResult(search);
		  }
		  else
		  {
		   fetchResult();
		  }
		 });

	
	
	
});  		

</script>