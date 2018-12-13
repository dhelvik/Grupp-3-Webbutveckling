<?php
include 'controller.php';
include 'model.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_POST['ACTION']){
        case '':
    }
}



$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        //Here Handle GET Request
        break;
    case 'POST':
        //Here Handle POST Request
        break;
    case 'DELETE':
        //Here Handle DELETE Request
        break;
    case 'PUT':
        //Here Handle PUT Request
        break;
}