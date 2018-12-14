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
        case 'registerEntry':
            registerEntry();
            break;
        case 'getEntries':
            getEntries();
            break;
        case 'checkLogin':
            header('Location: '.checkLogin().'');
            die();
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
        echo $e->getMessage();
    }
}

function checkLogin(){
     $controller = new Controller();
     $user = $controller->signIn(new User($_POST['username'], $_POST['password']));
     if(is_null($user)){
        $_SESSION['signInError'] = 'Fel användare eller lösenord.';
        return '/admin.php';
     }else {
         $_SESSION['user'] = $user->username;
         return "/admin.php";
     }
}

?>