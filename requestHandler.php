<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
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