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
    <script>
        $(function(){
  /* $("#nav").load("nav.html"); 
  $("#header").load("header.html");
  $("#footer").load("footer.html");
  $("#left").load("section.html");
  $("#right").load("aside.html");
  */});
</script>
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
                <h1>Hitta hit</h1>
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d71935.24590903768!2d13.127784934335432!3d55.70678137539445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4653907c03e75a3b%3A0x4019078290e7a70!2sLund!5e0!3m2!1sen!2sse!4v1542294310954" width="600" height="450" frameborder="1" style="border:0" allowfullscreen></iframe>
            <p>Vi rekommenderar alla besökare att använda sig av kollektivtrafik för att ta sig till och från karnevalsområdet. Information om detta hittar ni på <a href="https://skanetrafiken.se">Skånetrafikens</a> hemsida.</p>  
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
