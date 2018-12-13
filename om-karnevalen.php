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
        <div id='main'>
           <div class="main-info">
            <h1>Länge leve Lundakarnevalen!</h1>
            <p>Lundakarnevalen går av stapeln vart fjärdde år och arrangears av Lunds studenter. Lunds Studentkårer är huvudmän. Lundakarnevalen är även en erkänd förening under Akademiska Föreningen. Under den senaste Lundakarnevalen engagerade sig  mer än 5000 studenter ideellt för att bygga upp karnevalernas karneval för drygt 400 000 besökare som kom under dagarna. Under karnevalsdagarna förvandlas Lundagård till ett stort karnevalsområde med tältnöjen, tombolabodar, studentspex, radiosändningar, artister och självklart mat och dryck. Dessutom går karnevalståget genom Lunds gator och sprider karnevalistisk glädje till alla ca 400 000 tillresta besökare. Karnevalen 2018 kommer att firas den 18-20 maj!</p>
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
