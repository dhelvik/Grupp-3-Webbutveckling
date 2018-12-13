﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="stylesheet" type="text/css" href="css\nav.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
    <link rel="stylesheet" type="text/css" href="css\main.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="js/form-validation.js"></script>
<?php 
        include 'application/dataAccessLayer.php';
        include 'application/model.php';
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $mail = $_POST["mail"];
        $phoneNumber = $_POST["phoneNumber"]; 
        $sectionName = $_POST["sectionName"];
        $karnevalist = new Karnevalist($firstName, $lastName, $mail, $phoneNumber);  
        $section = new Section($sectionName);
        $dal = new DataAccessLayer();
        $dal->setKarnevalist($karnevalist);
        $dal->setKarnevalistSection($karnevalist, $section);      
       
?>
</head>

<body>
    <div id="container">
        <header id="header">
       
        <?php 
              include("header.php");
        ?></header>
         <?php
            include("nav.php");
            ?>
        <aside id="left">
        <?php
                    include("section.php");
                ?>
        </aside>
        <div id='main'>
            <h1>Tack för din ansökan <?php echo $firstName;?>!</h1>
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