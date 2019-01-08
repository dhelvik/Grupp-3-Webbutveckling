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
			<input id="firstName" type="text" name="firstName" required placeholder="Förnamn*">
			<label>Efternamn*</label>
			<input id="lastName" type="text" name="lastName" required placeholder="Efternamn*">
			<label>E-post*</label>
			<input id="email" type="email" name="mail" required placeholder="E-post*">
			<label>Telefonnummer</label>
			<input id="phoneNumber" type="text" name="phoneNumber" placeholder="Telefonnummer">
            <select id='sections' name="sectionName">
            </select>
            <input name="ACTION" value="registerApplication" type="hidden">
            <input type="submit" value="Ansök">
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
					$('#firstName').val('');
					$('#lastName').val('');
					$('#email').val('');
					$('#phoneNumber').val('');
					
					
				},
				error: function(xhr, status, error){
					$('#labelRegisterResponse').text('');
					$('#labelRegisterResponse').text(status);
				}
			});
		});
	});
	function updateVacancies(){
		$.ajax({
			method: "POST",
			url: "application/requestHandler.php",
			datatype: 'json',
			data: {
				ACTION : 'updateVacancies',
			},	
			success: function(result){
 				result.forEach(function(item){
					$('#sections').append('<option value="'+item.sectionName+'">'+item.sectionName+' - '+item.numOfVacancies+' platser kvar'+'</option>');
 				});
			}

			});
	}
	$(document).ready(updateVacancies); 
	</script>
</body>
</html>
