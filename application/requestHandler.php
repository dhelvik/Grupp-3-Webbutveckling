<?php
include 'controller.php';
include 'model.php';
include 'sendEmail.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['ACTION']) {
        case 'registerApplication':
            registerApplication();
            break;
            
        case 'updateVacancies':
            getVacancies();
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
            
        case 'signOut':
            header('Location: '.signOut().'');
            die();
            break;

        case 'getEventTypes':
            getEventTypes();
            break;
            
        case 'getEventsForType':
            getEventsForType();
            break;
            
        case 'getEventsForTypeDate':
            getEventsForTypeDate();
            break;
            
        case 'reserveTickets':
            reserveTickets();
            break;
            
        case 'registerQuestion':
            registerQuestion();
            break;
            
        case 'getAside':
            getAside();
            break;
            
        case 'getPosts':
            getPosts();
            break;
    }
}

function registerApplication()
{
    try {
        $controller = new Controller();
        $controller->registerApplication(new Karnevalist(htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['phoneNumber'])), new Section(htmlspecialchars($_POST['sectionName'])));
        echo 'Tack för ansökan ' . $_POST['firstName'];
    } catch (PDOException $e) {
        echo 'Den här epostadressen har redan ansökt till vald sektion.';
    }
}

function getVacancies()
{
    try {
        $controller = new Controller();
        $list = $controller->getSectionInfo();
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($list);
    } catch (Exception $e) {
        echo 'fel';
    }
}

function registerEntry()
{
    try {
        $controller = new Controller();
        $datetime = date("y-m-d h:i:s");
        $controller->registerEntry(new Entry(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['comment']), $datetime));
        echo 'Tack för ditt inlägg ' . $_POST['name'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getEntries()
{
    try {
        $controller = new Controller();
        $entries = $controller->getEntries();
        header('Content-Type: application/json; charset=UTF-8');   
        echo json_encode($entries);
    } catch (PDOException $e) {
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
         $_SESSION['signInError'] = '';
         $_SESSION['user'] = serialize($user);
         return "/admin.php";
     }
}
function signOut(){
    $_SESSION['user'] = null;
    return "/index.php";
}

function getEventTypes()
{
    try {
        $controller = new Controller();
        $eventTypes = $controller->getEventTypes();
        echo json_encode($eventTypes);
    } catch (PDOException $e) {
        echo $e->getMessage();
    } 
}

function getEventsForType()
{
    try {
        $eventName = $_POST['eventName'];
        $controller = new Controller();
        $events = $controller->getEventsForType($eventName);
        echo json_encode($events);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getEventsForTypeDate()
{
    try {
        $eventName = $_POST['eventName'];
        $eventDate = $_POST['eventDate'];
        $controller = new Controller();
        $events = $controller->getEventsForTypeDate($eventName, $eventDate);
        echo json_encode($events);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function reserveTickets()
{
    try {
        $customerFirstName = $_POST['firstname'];
        $customerLastName = $_POST['lastname'];
        $customerName = $customerFirstName . " " . $customerLastName;
        $customerEmail = $_POST['email'];        
        $eventName = $_POST['event'];
        $eventDate = $_POST['date'];
        $eventTime = $_POST['time'];
        $ticketQuantity = $_POST['ticketQuantity'];
        $customerPhoneNbr = $_POST['phoneNbr'];
        $controller = new Controller();
        $controller->reserveTickets($customerName, $customerEmail, $customerPhoneNbr, $eventName, $eventDate, $eventTime, $ticketQuantity);
        
        sendEmailTickets($customerName, $customerEmail, $eventName, $eventDate, $eventTime, $ticketQuantity);
        
        echo 'Success';
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function registerQuestion(){
    try {
        $controller = new Controller();
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $question = $_POST['question'];
        $controller->registerQuestion($name, $mail, $question);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getAside()
{
    try {
        $controller = new Controller();
        $aside = $controller->getAside();
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($aside);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function getPosts()
{
    try {
        $controller = new Controller();
        $posts = $controller->getPosts();
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($posts);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>