<?php
$connect = mysqli_connect("localhost", "root", "root", "webbutveckling");
$mail = $_POST["mail"];
$text = $_POST["text"];
$currSectionName = $_POST["currentSection"];
$column_name = $_POST["column_name"];
if($column_name == "sectionName"){
    $sql = "UPDATE KarnevalistSection SET " .$column_name."='".$text."' WHERE mail='".$mail."' AND sectionName='".$currSectionName."'";
    
    if(mysqli_query($connect, $sql))
    {
        echo 'Data Updated';
    }
}
else{
$sql = "UPDATE Karnevalist SET ".$column_name."='".$text."' WHERE mail='".$mail."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Updated';
}
}
?>