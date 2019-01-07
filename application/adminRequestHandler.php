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
        case 'sendAdminEmail';
            sendEmail();
            break;
        case 'addPost';
            addPostToDB();
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
       
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        

}
function savePicture($imgName){
    try{
        if(isset($_FILES['image'])){
            $errors= array();
           
            $tmpName = $_FILES['image']['tmp_name'];
           
           
            $fileExt=strtolower(end(explode('.',$_FILES['image']['name'])));
            
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($fileExt,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            
            if(empty($errors)==true) {
                move_uploaded_file($tmpName,"/Users/danielhelvik/Documents/T5/Webutveckling/Grupp-3-Webbutveckling/bilder/".$imgName);
                echo 'Success';
            }else{
                echo($errors);
            }
        }
    }catch (Exception $e) {
        echo $e->getMessage();
    }
}
function addPostToDB(){
    try{
        $adminController = new AdminController();
        $heading = $_POST['heading'];
        $postText = $_POST['text'];
        $imgName = $_FILES['image']['name'];
        $imgPath = "bilder/".$imgName;
        savePicture($imgName);
        $adminController->addPostToDB($heading, $postText, $imgName, $imgPath);
        
        
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function addEventInfoToDB(){
    try{
        $adminController = new AdminController();
        $heading = $_POST['heading'];
        $eventInfo = $_POST['text'];
        $imgName = $_FILES['image']['name'];
        $imgPath = "bilder/".$imgName;
        savePicture($imgName);
        $adminController->addEventInfoToDB($heading, $eventInfo, $imgName, $imgPath);
        
        
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function sendEmail(){ 
    try{
    $emails = $_POST['emails'];
    $message = $_POST['message'];
    
    sendAdminEmail($message, $emails);
    
    
} catch (Exception $e) {
    echo $e->getMessage();
}}


?>