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
            <h1>Tåget</h1>
            <p>Karnevalståget är det största och absolut äldsta nöjet i Lundakarnevalen, ett flera km långt tåg fyllt med fest, glädje och humor! Tåget rullar norrut från Lundagård kl 13 under lördag och söndag, 19-20 maj. Med sina 20 vagnar plus mellanekipage kommer det ta drygt två timmar för den att göra sitt varv moturs genom Lund!

            Karnevalståget rullar nu för första gången på en ny bana. Karnevalståget är nämligen inte som andra tåg, vi är rälsaverta! Så på grund av arbetet med spårvagnen kommer vi i år från Allhelgonakyrkan ta Bredgatan och s:t Petri Kyrkogata ner till Clemenstorget, istället för att gå längs s:t Laurentiigatan.
                <br>Vi ses där!</p>
            
            <h2>Tider</h2>
            <p>Tider
Tåget startar precis norr om Lundagård kl 13 både lördag och söndag 19-20 maj. Det tar ca två timmar för karnevalståget att ta sig (moturs) runt Lund!</p>
            <p>Datum: 19 maj<br>
                Tid:10.00<br>
                Antal vagnar: 23st<br>
                Vikt: 1 ton<br>
                Längd i meter:7 km<br>
                Färdväg: på grund av ombyggnationer i Lund centrum är tågets färdväg inte helt spikad. Uppdaterad info kommer snart.</p>
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
