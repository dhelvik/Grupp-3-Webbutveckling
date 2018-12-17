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
            
        case 'registerEntry':
            registerEntry();
            break;

        case 'getEntries':
            getEntries();
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
    }
}

function registerApplication()
{
    try {
        $controller = new Controller();
        $controller->registerApplication(new Karnevalist($_POST['firstName'], $_POST['lastName'], $_POST['mail'], $_POST['phoneNumber']), new Section($_POST['sectionName']));
        echo 'Tack för ansökan ' . $_POST['firstName'];
    } catch (PDOException $e) {
        echo 'Den här epostadressen har redan ansökt till vald sektion.';
    }
}

function registerEntry()
{
    try {
        $controller = new Controller();
        $datetime = date("y-m-d h:i:s");
        $controller->registerEntry(new Entry($_POST['name'], $_POST['email'], $_POST['comment'], $datetime));
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
        
        sendEmail($customerName, $customerEmail, $eventName, $eventDate, $eventTime, $ticketQuantity);
        
        
        echo $customerName;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>