<!DOCTYPE html>
<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />   
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
            include("main.php");
            include("aside.php");
            ?>
        </div>
  		<?php 
  		include("footer.php"); 
  		?>
  	</div>
</body>
</html>
