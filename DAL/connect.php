<?php
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Webbutveckling');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn){
    die("Connection failed " . mysqli_connect_error());
}
echo "Connected Successfully";
?>