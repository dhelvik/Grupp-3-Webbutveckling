<!DOCTYPE html>
<html>

<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    include ("includes/section.php");
    ?>
	<div id='main'>

		<h1>Reservera Biljetter</h1>
		<form id="reserveTickets" class="my-form" method="post"
			action="application/form.php">
			<label>Förnamn*</label> <input id="inputFirstName" type="text"
				name="firstname" required> <label>Efternamn*</label> <input
				id="inputLastName" type="text" name="lastname" required> <label>E-post*</label>
			<input id="inputEmail" type="email" name="email" required> <label>Telefonnummer</label>
			<input id="inputPhoneNbr" type="text" name="phoneNbr"> <select
				id="event" name="event"><option>Välj Event:</option>

			</select> <select id="date" name="date" disabled="true">
				<option>Välj Datum:</option>
			</select> <select id="time" name="time" disabled="true">
				<option>Välj Tid:</option>
			</select> <select id="ticketQuantity" name="ticketQuantity">
				<option value=1>1 Biljett</option>
				<option value=2>2 Biljetter</option>

				<option value=3>3 Biljetter</option>

				<option value=4>4 Biljetter</option>

				<option value=5>5 Biljetter</option>
				<option value=6>6 Biljetter</option>


			</select> <input type="submit" value="Reservera"> <input
				name="ACTION" value="reserveTickets" type="hidden">
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
		<script>
	$('#event').change(function() {	  
		$('#date').empty();
		$('#time').empty();
		var eventName = this.value;
		$.ajax({
			method: "POST",
			url: "application/requestHandler.php", 
			data: {'ACTION': 'getEventsForType', 'eventName': eventName},
			datatype: 'json',
			success: function(result){
				
				jsonObj = JSON.parse(result);
				$('#date').append($('<option>', {
					text: 'Välj Datum:'
				}));
				$('#time').append($('<option>', {
					text: 'Välj Tid:'
				}));
				jsonObj.forEach(function(item){
					
					$('#date').append($('<option>', {
						data: item.remainingTickets,
						value: item.date,
						text: item.date
					}));
					 $('#date').removeAttr("disabled");
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
		<script>
	$('#date').change(function() {	  
		$('#time').empty();
		var e = document.getElementById("event");
		var eventName = e.options[e.selectedIndex].value;
		var eventDate = this.value;
		
		$.ajax({
			method: "POST",
			url: "application/requestHandler.php", 
			data: {'ACTION': 'getEventsForTypeDate', 'eventDate': eventDate, "eventName": eventName},
			datatype: 'json',
			success: function(result){
				
				jsonObj = JSON.parse(result);
				$('#time').append($('<option>', {
					text: 'Välj Tid:'
				}));
				jsonObj.forEach(function(item){
					//alert(item.remainingTickets);
					$('#time').append($('<option>', {
						id: item.remainingTickets,
						value: item.time,
						text: item.time + ' - ' +item.remainingTickets + ' Biljetter kvar' ,
						
						
					}));
					 
					 $('#time').removeAttr("disabled");
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

		<script>
	$(function(){
		$("#reserveTickets").submit(function(e){
		var ticketsRemaining = $("#time option:selected").attr('id');	
		
		if(ticketsRemaining >= $("#ticketQuantity option:selected").val()){
		
		e.preventDefault();
			$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				datatype: 'json',
				data: $("#reserveTickets").serialize(),
				success: function(result){
					alert(result);

				},
				error: function(xhr, status, error){
					$('#labelEntryResponse').text('');
					$('#labelEntryResponse').text(status);
				}
			
			});
		} else {
			e.preventDefault();
			alert("Det finns bara " + ticketsRemaining + " kvar");
			}
		});
	});
	</script>
	</div>
	<?php
include ("includes/aside.php");
include ("includes/footer.php");
?>
</body>
</html>
