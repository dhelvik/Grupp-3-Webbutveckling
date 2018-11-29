<?php
include_once 'connection.php';

    try{
        $database = new Connection();
        $db = $database->openConnection();
        $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES" ;
 
        foreach ($db->query($sql) as $row) {
            echo " ID: ".$row['TABLE_NAME'] . "<br>";
            echo " Name: ".$row['TABLE_TYPE'] . "<br>"; 
        }
        $db->closeConnection();
    }
    catch (PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

?>