<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\main.css">
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="stylesheet" type="text/css" href="css\nav.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
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
                  <iframe width="560" height="315"   src="https://www.youtube.com/embed/DdYgGZBKVR4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h1>Bli Karnevalist</h1>
            <p>För att kunna leverera karnevalernas karneval krävs det en hel del arbete från hängivna studenter. Över 5000 studenter behövdes under den senaste karnevalen för att kunna leverera en upplevelse utöver det vanliga för våra hundratusentals besökare. Är du intresserad av att hjälpa till rekommenderar vi dig att besöka vår <a href="ansok.html">ansökningssida</a> eller besök Af-Borgen den 4:e februari kl 10.00</p>
         
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
