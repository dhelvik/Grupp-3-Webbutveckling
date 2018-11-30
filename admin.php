<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\css.css">
    <link rel="shortcut icon" type="image/png" href="bilder\favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />

    <script>
        $(function() {
           //$("#nav").load("nav.php");
           // $("#header").load("header.html");
          //  $("#footer").load("footer.html");
           // $("#left").load("section.html");
            //$("#right").load("aside.html");
          //  $("#main").load("main.html");
        });
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

        <div id="container-main">
            <aside id="left">
                <?php
                    include("section.php");
                ?>
            </aside>
            <div id="main">
                <div id="login">
                    <h2>Admin Login</h2>
                    <form action="" method="post">
                        <label>Användarnamn :</label>
                        <input id="name" name="username" placeholder="username" type="text">
                        <label>Lösenord :</label>
                        <input id="password" name="password" placeholder="**********" type="password">
                        <input name="submit" type="submit" value=" Login ">
                        <span>
                            <?php echo $error; ?></span>
                    </form>
                </div>
            </div>
            <aside id="right">
                <?php
                    include("aside.php");
                ?>
            </aside>
        </div>
        <footer id="footer">
            <?php
                include("footer.php");
            ?>
        </footer>
    </div>
</body>

</html>
