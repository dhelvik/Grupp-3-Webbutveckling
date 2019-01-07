<!DOCTYPE html>
<?php
session_start();
$user = unserialize($_SESSION['user']);
if ($user != false) {
    header('Location: /index.php');
}
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
			<h2>Admin Login</h2>
			<form id="loginForm" action="application/requestHandler.php" method="post">
				<label>Användarnamn :</label> 
				<input id="username" name="username" placeholder="användarnamn" type="text"> <label>Lösenord :</label> 
				<input id="password" name="password" placeholder="lösenord" type="password"> 
				<input name="submit" type="submit" value="Logga in">
				<input name="ACTION" value="checkLogin" type="hidden">
			</form>
		</div>
		<label><?php echo $_SESSION['signInError']?></label>
	</div>
    <?php
    include ("includes/aside.php");
    include ("includes/footer.php");
    ?>
</body>
</html>
