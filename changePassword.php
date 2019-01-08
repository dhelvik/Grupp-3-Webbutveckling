<!DOCTYPE html>
<?php
session_start();

?>
<html>
<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    include ("includes/section.php");
    ?>
    <div id="main" style="text-align:center;">
		<div id="login" style="display:inline-block;">
			<h2>Byt lösenord</h2>
			<form id="changePasswordForm">
				<input id="oldPassword" name="oldPassword" placeholder="gamla lösenordet" type="password" required>  
				<input id="newPassword" name="newPassword" placeholder="nytt lösenord" type="password" required> 
				<input id="confirmPassword" name="confirmPassword" placeholder="bekräfta" type="password" required> 
				
				<input id="btnChangePassword" name="submit" type="submit" value="Byt lösenord">
				<input name="ACTION" value="changePassword" type="hidden">
			</form>
			<label id="labelResponse"></label>
		</div>
		<label><?php echo $_SESSION['signInError']?></label>
	</div>
    <?php
    include ("includes/aside.php");
    include ("includes/footer.php");
    ?>
</body>
</html>
<script type="text/javascript">
$("#btnChangePassword").click(function(e){
	e.preventDefault();
	$('#labelResponse').empty();
	
	if($('#confirmPassword').val()===$('#newPassword').val()){
	  
	  $.ajax({
		  
			type : "POST",
			url : "application/adminRequestHandler.php",
			data: 
				$("#changePasswordForm").serialize(), 
				
				
			success : function(result) {
				if(result==1){
				$('#labelResponse').empty();
				$('#labelResponse').append('Lösenord bytt');
				$('#oldPassword').val('');
				$('#newPassword').val('');
				$('#confirmPassword').val('');
				}else{
					$('#labelResponse').empty();
					$('#labelResponse').append('Det gamla lösenordet matcher ej');
					}
							},
			error : function(result) {
				$('#labelResponse').empty();
				$('#labelResponse').append('Något gick fel');
				
			}
		});
	} else{
		$('#labelResponse').append('Lösenorden matchar inte');
		};
});

	</script>  
