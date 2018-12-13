<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="stylesheet" type="text/css" href="css\nav.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
    <link rel="stylesheet" type="text/css" href="css\main.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="js/form-validation.js"></script>
    <script type="text/javascript">
    $(function(){
		$("#registerForm").submit(function(e){
		e.preventDefault();
			$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				datatype: 'json',
				data: $("#registerForm").serialize(), 
				success: function(result){
					$('#labelRegisterResponse').text('');
					$('#labelRegisterResponse').text(result);
				},
				error: function(xhr, status, error){
					$('#labelRegisterResponse').text('');
					$('#labelRegisterResponse').text(status);
				}
			});

		});
    });
    </script>
</head>

<body>
   <div id="container">
        <?php 
        include("header.php");
        include("nav.php");
        ?>
        <div id="container-main">
        	<?php
        	include("section.php");
        	?>
        <div id='main'>
            <h1>Ansök</h1>
            <form id="registerForm" class="my-form" >
                <label>Förnamn*</label>
				<input id="inputFirstName" type="text" name="firstName" required placeholder="Förnamn*">
				<label>Efternamn*</label>
				<input id="inputLastName" type="text" name="lastName" required placeholder="Efternamn*">
				<label>E-post*</label>
				<input id="inputEmail"type="email" name="mail" required placeholder="E-post*">
				<label>Telefonnummer</label>
				<input id="inputPhoneNbr"type="text" name="phoneNumber" placeholder="Telefonnummer">
                <select id="sectionName" name="sectionName">
                    <option value="adminsterit">ADMINSTERIT</option>
                    <option value="biljonsen">BILJONSEN</option>
                    <option value="bladderiet">BLÄDDERIET</option>
                    <option value="dansen">DANSEN</option>
                </select>
                <input name="ACTION" value="registerApplication" type="hidden">
                <input type="submit" id="btnRegister" value="Apply">
            </form>
            <label id="labelRegisterResponse"></label>
        </div>
        <?php 
        include("aside.php");
        ?>
        </div>
  		<?php 
  		include("footer.php"); 
  		?>
    </div>
</body>

</html>
