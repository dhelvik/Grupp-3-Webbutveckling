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
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />

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

        <header id="header">
            <?php 
              include("header.php");
        ?>
        </header>
             <?php
            include("nav.php");
            ?>

        <aside id="left">
            <?php
                    include("section.php");
                ?>
        </aside>

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
        <aside id="right">
            <?php
                    include("aside.php");
                ?>
        </aside>
        <footer id="footer">
             <?php
                include("footer.php");
            ?>
        </footer>

    </div>
</body>

</html>