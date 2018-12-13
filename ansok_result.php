<?php
include 'application/dataAccessLayer.php';
include 'application/model.php';  
    $karnevalist = new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']);
    $sectionName = new Section($_POST["sectionName"]);
    $dal = new DataAccessLayer();
    $dal->setKarnevalist($karnevalist);
    /*$myJson = json_encode($karnevalist);
    echo $myJson;*/
?>