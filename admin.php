<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
<body>
    <?php
    include ("includes/header.php");
    include ("includes/nav.php");
    include ("includes/section.php");
    ?>
    <div id="main">
		<div id="login">
			<h2>Admin Login</h2>
			<form action="" method="post">
				<label>Användarnamn :</label> 
				<input id="name" name="username" placeholder="username" type="text">
				<label>Lösenord :</label>
				<input id="password" name="password" placeholder="**********" type="password"> 
				<input name="submit" type="submit" value=" Login ">
			</form>
		</div>
	</div>
    <?php
    include ("includes/aside.php");
    include ("includes/footer.php");
    ?>
</body>
</html>
