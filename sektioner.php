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
        <div id="main">
        <div class="main-info">
           <h1>Lundakarnevalen har en handfull olika sektioner för att kunna skapa den bästa karnevalen hitills! Däribland:</h1>
            <ul class="main-list">
            <li>Administerit</li>
            <li>Biljonsen</li>
            <li>Blädderiet</li>
            <li>Dansen</li>
                
            </ul>
        </div>
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
