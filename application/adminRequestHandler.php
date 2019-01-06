<?php
include 'adminController.php';
include 'sendEmail.php';
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
        case 'sendResponse':
            sendResponse();
            break;
        case 'addEventInfo';
            addEventInfo();
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
function sendResponse(){
    try {
        $dao = new AdminDao();
        $QID=$_POST['id'];
        $answer=$_POST['answer'];
        $mail =$_POST['mail'];
        $dao->deleteQuestion($QID);
        sendEmailFAQ($answer, $mail);
        // HAR INTE LÖST SÅ ATT SVARET SKICKAS VIA MAIL
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        

}
function addEventInfo(){
    try{
        if(isset($_FILES['image'])){
            $errors= array();
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $fileExt=strtolower(end(explode('.',$_FILES['image']['name'])));
            $filePath = "bilder/".$fileName;
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($fileExt,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($fileSize > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }
            if (file_exists("/Users/danielhelvik/Documents/T5/Webutveckling/Grupp-3-Webbutveckling/bilder/".$fileName)) {
               $errors[] = 'File already exists';
            }
            
            if(empty($errors)==true) {
                move_uploaded_file($tmpName,"/Users/danielhelvik/Documents/T5/Webutveckling/Grupp-3-Webbutveckling/bilder/".$fileName);
                addEventInfoToDB($fileName, $filePath);
                echo "Success";
            }else{
                echo($errors);
            }
        }
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}

function addEventInfoToDB($imgName, $imgPath){
    try{
        $adminController = new AdminController();
        $heading = $_POST['heading'];
        $eventInfo = $_POST['text'];
        
        $adminController->addEventInfoToDB($heading, $eventInfo, $imgName, $imgPath);
        
        
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>