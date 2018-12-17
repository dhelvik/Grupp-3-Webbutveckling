<!DOCTYPE html>
<?php session_start();
$user = unserialize($_SESSION['user']);
if ($user != false){
    header('Location: /index.php');
}

?>
<html>
<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
//     include ("includes/section.php");
    ?>
    <div id="main">
		<div id="login">
			<h2>Admin Login</h2>
			<form id="loginForm" action="application/requestHandler.php" method="post">
				<label>Användarnamn :</label> 
				<input id="name" name="username" placeholder="username" type="text">
				<label>Lösenord :</label>
				<input id="password" name="password" placeholder="password" type="password"> 
				<input name="submit" type="submit" value=" Login ">
				<input name="ACTION" value="checkLogin" type="hidden">
			</form>
		</div>
    <lable><?php echo $_SESSION['signInError']?></lable>
	</div>
    <?php
//     include ("includes/aside.php");
    include ("includes/footer.php");
    ?>
</body>
</html>
