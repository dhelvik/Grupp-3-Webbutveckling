<?php
include 'controller.php';
include 'model.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
}
    
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_POST['ACTION']){
        case 'registerApplication':
            registerApplication();
            break;
    }
    switch ($_POST['ACTION']){
        case 'registerEntry':
            registerEntry();
            break;
    }
    switch ($_POST['ACTION']){
        case 'getEntries':
            getEntries();
            break;
    }
}

function registerApplication(){
    try {
        $controller = new Controller();
        $controller->registerApplication(new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']), new Section($_POST['sectionName']));
        echo 'Tack för ansökan ' .$_POST['firstName'];
    } catch (PDOException $e) {
        echo 'Den här epostadressen har redan ansökt till vald sektion.';
    }
}
function registerEntry(){
    try {
        $controller = new Controller();
        $datetime=date("y-m-d h:i:s");
        $controller->registerEntry(new Entry($_POST['name'], $_POST['email'], $_POST['comment'], $datetime));
        echo 'Tack för ditt inlägg ' .$_POST['name'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getEntries(){
    try{
        $controller = new Controller();
        $entries = $controller->getEntries();
        echo json_encode($entries);    
    } catch(PDOException $e){
        echo "error";
    }
}

?>