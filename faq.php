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
            <div class="main-info">
            <h1>Vanliga frågor och svar</h1>
            <p>Hur ofta hålls Lundakarnevalen?<br>
                - Var fjärde år.</p>
             <p>Hur gör jag för att bli karnevalist?<br>
                - Gå in på <a href="ansok.html">ansök</a> på hemsidan eller bvefinn dig på Af-Borgen 4:e februari.</p>
                 <p>Vilket år hölls den första Lundakarnevalen?<br>
                - År 1862.</p>
                 <p>Hur många engagerade studenter deltar?<br>
                - Föregående karneval deltog mer än 5000 studenter.</p>
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