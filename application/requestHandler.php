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
    }
}

function registerApplication(){
    try{
    $controller = new Controller();
    $karnevalist = new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']);
    $section = new Section($_POST['sectionName']);
    $controller->registerApplication($karnevalist, $section);
    }
    catch(PDOException $e){
        echo json_encode(array("success" => false, "error" => $e->getMessage()));
    }
}

?>