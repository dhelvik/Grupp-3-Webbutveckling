<?php session_start();
require_once 'application/model.php';
$user = unserialize($_SESSION['user']);
?>
<nav id='nav'>
    <ul class="phone-bar">
        <li><a href="#"><img src="bilder/mobile-nav-icon.png"></a>
            <ul class="navClass">
                <li><a href="index.php">Hem</a></li>
                <li><a href="bli-karnevalist.php">Bli Karnevalist</a>
                    <ul>
                        <li><a href="ansok.php">Ansök</a></li>
                        <li><a href="sektioner.php">Sektioner</a>
                            <ul>
                                <li><a href="sektioner.php#Administerit">AdminsterIT</a></li>
                                <li><a href="sektioner.php#Biljonsen">Biljonsen</a></li>
                                <li><a href="sektioner.php#Blädderiet">Blädderiet</a></li>
                                <li><a href="sektioner.php#Dansen">Dansen</a></li>
                                <li><a href="sektioner.php#Ekonomi">Ekonomi</a></li>
                                <li><a href="sektioner.php#Fabriken">Fabriken</a></li>
                                <li><a href="sektioner.php#Festmästeriet">Festmästeriet</a></li>
                                <li><a href="sektioner.php#Kommunikationen">Kommunikationen</a></li>
                                <li><a href="sektioner.php#Mediahuset">Mediahuset</a></li>
                                <li><a href="sektioner.php#Musiken">Musiken</a></li>
                                <li><a href="sektioner.php#Nöjessektioner">Nöjessektioner</a></li>
								<li><a href="sektioner.php#Områdessektionerna">Områdessektionerna</a></li>
                                <li><a href="sektioner.php#Produktsektionerna">Produktsektionerna</a></li>
                                <li><a href="sektioner.php#Säkerhetssektionen">Säkerhetssektionen</a></li>
                                <li><a href="sektioner.php#Tågsektionerna">Tågsektionerna</a></li>
                                <li><a href="sektioner.php#Vieriet">Vieriet</a></li>
                                
                                
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="om-karnevalen.php">Om Karnevalen</a>
                    <ul>
                        <li><a href="nojen.php">Nöjen</a></li>
                        <li><a href="artister.php">Artister</a></li>
                        <li><a href="taget.php">Tåget</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="hitta-hit.php">Hitta hit</a></li>
                    </ul>
                </li>
                <li><a href="reservera-biljetter.php">Reservera Biljetter</a></li>
                <li><a href="guestbook.php">Gästbok</a></li>
                <?php if ($user != false) {
                    echo '<li><a>'.$user->username .'</a><ul><li><a href="adminVy.php">Karnevalister</a></li><li><a href="adminQuestion.php">Meddelanden</a></li><li><a href="addEventInfo.php">Lägg till evenemang</a></li><li><a href="addPost.php">Lägg till inlägg</a></li><li><a href="changePassword.php">Byt lösenord</a></li><li><a onclick=document.getElementById("signOut").submit();>Logga ut</a></li></ul></li>';
                    echo '<form id="signOut" action="application/requestHandler.php" method="post"><input type="hidden" name="ACTION" value="signOut"/></form>';
                }?>  
            </ul>
        </li>
    </ul>
   
</nav>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("nav");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    

</script>