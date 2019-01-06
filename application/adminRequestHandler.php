<?php
include 'adminController.php';

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
        // HAR INTE LÖST SÅ ATT SVARET SKICKAS VIA MAIL
    } catch (Exception $e) {
        echo $e->getMessage();
    }
        

}
function addEventInfo(){
    try{
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $filePath = "bilder/".$file_name;
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }
            if (file_exists("/Users/danielhelvik/Documents/T5/Webutveckling/Grupp-3-Webbutveckling/bilder/".$file_name)) {
               $errors[] = 'File already exists';
            }
            
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"/Users/danielhelvik/Documents/T5/Webutveckling/Grupp-3-Webbutveckling/bilder/".$file_name);
                addEventInfoToDB($file_name, $filePath);
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