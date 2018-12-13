<?php
include 'controller.php';
include 'model.php';

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
        $karnevalist = new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']);
        $section = new Section($_POST['sectionName']);
        $controller->registerApplication($karnevalist, $section);
        echo 'Tack för ansökan ' .$_POST['firstName'];
    } catch (PDOException $e) {
        echo 'Den här epostadressen har redan ansökt till vald sektion.';
    }
}

?>