<?php
$connect = mysqli_connect("localhost", "root", "root", "webbutveckling");
$sql = "DELETE FROM Karnevalist WHERE mail = '".$_POST["mail"]."'";
if(mysqli_query($connect, $sql))
{
    echo $POST["mail"]. 'Data Deleted';
}
?>