<!DOCTYPE html>
<html>
<?php include("head.php");?>
<body>
    <?php 
    include("header.php");
    include("nav.php");
    include("section.php");
    ?>
	<div id='main'>
		<h1>Reservera Biljetter</h1>
		<form class="my-form" method="post" action="application/form.php">
			<label>Förnamn*</label> 
			<input id="inputFirstName" type="text" name="firstname" required>
			<label>Efternamn*</label> 
			<input id="inputLastName" type="text" name="lastname" required>
			<label>E-post*</label> 
			<input id="inputEmail" type="email" name="epost" required>
			<label>Telefonnummer</label> <input id="inputPhoneNbr" type="text" name="telefonnummer">
			<select id="event" name="event">
				<option value="Opera">OPERAN</option>
				<option value="Cirkus">CIRKUS</option>
				<option value="Kabarén">KABARÉN</option>
				<option value="Spexet">SPEXET</option>
			</select> 
			<select id="date" name="date">
				<option value="2018-05-19">19:e maj</option>
				<option value="2018-05-20">20:e maj</option>
				<option value="2018-05-21">21:e maj</option>
				<option value="2018-05-22">22:e maj</option>			

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
	</div>
	<?php 
    include("aside.php");
	include("footer.php"); 
	?>
</body>
</html>
