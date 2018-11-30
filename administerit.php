<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="stylesheet" type="text/css" href="css\nav.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
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
