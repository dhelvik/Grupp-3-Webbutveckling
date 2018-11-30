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
    <script src="js/form-validation.js"></script>
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
            <h1>Ansök</h1>
            <form class="my-form" />
                <div class="form-group">
                    <label>Förnamn*</label>
                    <input id="inputFirstName" type="text" name="firstname" required>

                </div>
                <div class="form-group">
                    <label>Efternamn*</label>
                    <input id="inputLastName" type="text" name="lastname" required>

                </div>

                <div class="form-group">
                    <label>E-post*</label>

                    <input id="inputEmail"type="email" name="epost" required>
                </div>
                <div class="form-group">
                    <label>Telefonnummer</label>
                    <input id="inputPhoneNbr"type="text" name="telefonnummer">
                </div>
                <select id="poster" name="poster">
                    <option value="adminsterit">ADMINSTERIT</option>
                    <option value="biljonsen">BILJONSEN</option>
                    <option value="bladderiet">BLÄDDERIET</option>
                    <option value="dansen">DANSEN</option>
                </select>
                <input type="submit" value="Ansök">
            </form>
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
