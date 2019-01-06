<?php
session_start();


?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    ?>
    <div id="main">
<div id="addEventInfo">
	<form id="eventInfo" name="eventInfo" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Rubrik:</td>
				<td>*</td>
				<td><input id="heading" name="heading" type="text" required /></td>
			</tr>
			<tr>
				<td>Bild:</td>
				<td>*</td>
				<td><input id="image" name="image" type="file" required /></td>
			</tr>
			<tr>
				<td valign="top">Text</td>
				<td valign="top">*</td>
				<td><textarea id="text" name="text" cols="60" rows="6"> </textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit" /></td>
			</tr>
			<input name="ACTION" value="addEventInfo" type="hidden">
	</form>
	</tr>
	</table>
	 <script type="text/javascript">
	$(function(){
		$("#eventInfo").submit(function(e){
			
		e.preventDefault();
			$.ajax({
				method: "POST",
				url: "application/adminRequestHandler.php", 
				datatype: 'application/json',
				data: new FormData($('#eventInfo')[0]),
				processData: false,
		        contentType: false,
				success: function(result){
				
					alert(result)
				},
				error: function(xhr, status, error){
					alert(status)
				}
			});
		});
	});
	</script>
	
</div>
</div>
 <?php
    include ("includes/footer.php");
    ?>
</body>
</html>




