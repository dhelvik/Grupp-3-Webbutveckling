<?php
include 'controller.php';
include 'model.php';
session_start();
function(){
    $karnevalist = new Karnevalist($_POST['firstname'], $_POST['lastname'], $_POST['epost'], $_POST['telefonnummer']);
    $section = new Section($_POST["poster"]);
    $controller = new Controller();
    $_SESSION['epost'] = $_POST['epost'];
    $_SESSION['poster'] = $_POST['poster'];
    $controller->registerApplication($karnevalist, $section);
    header('Location: http://localhost:8888/ansok.php');
    die();
}

?>