<!DOCTYPE html>
<html>

<?php include("includes/head.php");?>
<body>
    <?php 
    include("includes/header.php");
    include("includes/nav.php");
    include("includes/section.php");
    ?>
	<div id='main'>
	
		<h1>Reservera Biljetter</h1>
		<form id="reserveTickets" class="my-form" method="post" action="application/form.php">
			<label>Förnamn*</label> 
			<input id="inputFirstName" type="text" name="firstname" required>
			<label>Efternamn*</label> 
			<input id="inputLastName" type="text" name="lastname" required>
			<label>E-post*</label> 
			<input id="inputEmail" type="email" name="epost" required>
			<label>Telefonnummer</label> <input id="inputPhoneNbr" type="text" name="telefonnummer">
			<select id="event" name="event">
				
			</select> 
			<select id="date" name="date">
				<option value="2018-05-19">19:e maj</option>
				<option value="2018-05-20">20:e maj</option>
				<option value="2018-05-21">21:e maj</option>
				<option value="2018-05-22">22:e maj</option>	

			</select> 
			<select id="time" name="time">
			<option value="18:00">18:00</option>
			<option value="20:00">20:00</option>			
			</select>
			<select id="ticketAmount" name="ticketAmount">
				<option value="1">1 Biljett</option>
				<option value="2">2 Biljetter</option>
				<option value="3">3 Biljetter</option>
				<option value="4">4 Biljetter</option>
				<option value="5">5 Biljetter</option>
				<option value="6">6 Biljetter</option>
			</select> 
			<input type="submit" value="Reservera">
		</form>
		<script>
	$(document).ready(function(){
				$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				data: {'ACTION': 'getEventTypes'},
				datatype: 'json',
				success: function(result){
					jsonObj = JSON.parse(result);
					jsonObj.forEach(function(item){
						$('#event').append($('<option>', {
							value: item.eventName,
							text: item.eventName
						}));
					
				});
				},
				error: function(xhr, status, error){
					alert(status);
					alert(error);
					//$('#labelEntryResponse').text('');
					//$('#labelEntryResponse').text(status);
				}
			});
		});
	
	</script>
	</div>
	<?php 
    include("includes/aside.php");
	include("includes/footer.php"); 
	?>
</body>
</html>
