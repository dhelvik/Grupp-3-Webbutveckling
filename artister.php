<!DOCTYPE html>
<html>
<?php include("head.php");?>
<body>
    <?php 
    include("header.php");
    include("nav.php");
    include("section.php");
    ?>
    <div id='main'>
    	<video width="100%" max-heigth="auto" autoplay loop>
        <source src="https://www.lundakarnevalen.se/wp-content/themes/Imaginal-WPtheme/img/webfilm.mp4" type="video/mp4">
        </video>
        <div class="main-info">
        <h1>Artister</h1>
            <ul class="main-info" style="list-style-type:none;">
                <li>Kamferdrops</li>
                <li>Panetoz</li>
                <li>Sabina Ddumba</li>
                <li>Maxida Märak</li>
                <li>The Hives</li>
                <li>Silvana Imam</li>
            </ul>
        </div>
    </div>
    <?php 
    include("aside.php");
	include("footer.php"); 
	?>
</body>
</html>
