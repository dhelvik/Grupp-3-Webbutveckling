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
?>