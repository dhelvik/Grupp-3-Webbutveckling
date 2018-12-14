<!DOCTYPE html>
<html>

<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    include ("includes/section.php");
    ?>
   
   <div id="main">
		<script type="text/javascript">
   	$(document).ready(function(){
			$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				data: {'ACTION': 'getEntries'},
				datatype: 'json',
				success: function(result){
					
					jsonObj = JSON.parse(result);
					jsonObj.forEach(function(item){
							$('#entries tbody').append('<tr><td>'+item.name+'</td><td>'+item.comment+'</td></tr>')
						});
					
				},
				error: function(xhr, status, error){
					alert(status);
					//$('#labelEntryResponse').text('');
					//$('#labelEntryResponse').text(status);
				}
			});
		});
	
	</script>
		<h1 align="center">Gästbok</h1>

		<table id="entries">
			<tr>
				<th>Namn</th>
				<th>Kommentar</th>
			</tr>
			
		</table>
  	<?php
include ("includes/guestbook-entry.php");
?>
	</div>
   <?php
include ("includes/aside.php");
include ("includes/footer.php");
?>
</body>
</html>
