<div id="guestBookEntry">
	<form id="guestBookForm" name="guestBookForm" method="post">
		<table>
			<tr>
				<td>Namn:</td>
				<td>*</td>
				<td><input id="entryName" name="name" type="text" id="name"required /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>*</td>
				<td><input id="entryEmail" name="email" type="text" id="email"required /></td>
			</tr>
			<tr>
				<td valign="top">Kommentar:</td>
				<td valign="top">*</td>
				<td><textarea id="entryComment" name="comment" cols="60" rows="6"> </textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit" /></td>
			</tr>
			<input name="ACTION" value="registerEntry" type="hidden">
	</form>
	</tr>
	</table>
	<label id="labelEntryResponse"> <script type="text/javascript">
	$(function(){
		$("#guestBookForm").submit(function(e){
		e.preventDefault();
			$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				datatype: 'application/json',
				data: $("#guestBookForm").serialize(),
				success: function(result){
					$('#labelEntryResponse').text('');
					$('#labelEntryResponse').text(result);
					$('#entryName').val('');
					$('#entryEmail').val('');
					$('#entryComment').val('');
					setTimeout(function(){
					location.reload();
					}, 2000);
					
				},
				error: function(xhr, status, error){
					$('#labelEntryResponse').text('');
					$('#labelEntryResponse').text(status);
				}
			});
		});
	});
	</script>

</div>




