<?php
include 'application/dataAccessLayer.php';
include 'application/model.php';

    $firstName = $_POST['firstName'];   
    $lastName = $_POST['lastName'];
    $mail = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];    
   // $sectionName = $_POST["poster"];
    $karnevalist = new Karnevalist($firstName, $lastName, $mail, $phoneNumber);
   $dal = new DataAccessLayer();
   $dal->setKarnevalist($karnevalist);
   $myJson = json_encode($karnevalist);
    echo $myJson;

?>