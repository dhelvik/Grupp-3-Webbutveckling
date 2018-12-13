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
        <h1>Ansök</h1>
        <form id="registerForm" class="my-form" >
            <label>Förnamn*</label>
			<input type="text" name="firstName" required placeholder="Förnamn*">
			<label>Efternamn*</label>
			<input type="text" name="lastName" required placeholder="Efternamn*">
			<label>E-post*</label>
			<input type="email" name="mail" required placeholder="E-post*">
			<label>Telefonnummer</label>
			<input type="text" name="phoneNumber" placeholder="Telefonnummer">
            <select name="sectionName">
                <option value="adminsterit">ADMINSTERIT</option>
                <option value="biljonsen">BILJONSEN</option>
                <option value="bladderiet">BLÄDDERIET</option>
                <option value="dansen">DANSEN</option>
            </select>
            <input name="ACTION" value="registerApplication" type="hidden">
            <input type="submit" value="Apply">
        </form>
        <label id="labelRegisterResponse"></label>
    </div>
    <?php 
    include("includes/aside.php");
	include("includes/footer.php"); 
	?>
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
</body>
</html>
