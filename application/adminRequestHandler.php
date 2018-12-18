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
        case 'deleteKarnevalist':
            deleteKarnevalist();
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
        $phoneNumber = $_POST['phoneNumber'];
        $adminController->updateKarnevalist($firstName, $lastName, $mail, $sectionName, $phoneNumber);
        
    }catch(PDOException $e){
            echo $e->getMessage();
        }
}
function deleteKarnevalist(){
    try{
        $adminController = new AdminController();
        $mail = $_POST['mail'];
        $adminController->deleteKarnevalist($mail);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


?>