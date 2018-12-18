<?php
include 'adminController.php';
include 'model.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['ACTION']) {
        case 'getKarnevelister':
            getKarnevalister();
            break;
        case 'updateKarnevalist':
            updateKarnevalist();
            break;
    }
}
function getKarnevalister(){
    try {
        $adminController = new AdminController();
        $search = $_POST['search'];
        header('Content-Type: application/json');
        $karnevalister = $adminController->getKarnevalists($search);
        echo json_encode($karnevalister);
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function updateKarnevalist(){
    try{
        $adminController = new AdminController();
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $mail = $_POST['mail'];
        $sectionName= $_POST['sectionName'];
        $adminController->updateKarnevalist($firstName, $lastName, $mail, $sectionName);
        
    }catch(PDOException $e){
            echo $e->getMessage();
        }
}


?>