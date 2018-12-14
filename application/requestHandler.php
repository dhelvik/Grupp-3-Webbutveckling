<?php
include 'controller.php';
include 'model.php';
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

        case 'getEventTypes':
            getEventTypes();
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

function getEvents()
{
    try {
        $eventType = $_POST['eventName'];
        $controller = new Controller();
        $events = $controller->getEventsForType($eventType);
        echo json_envode($events);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>