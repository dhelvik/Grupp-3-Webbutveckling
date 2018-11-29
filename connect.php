<?php
define('DB_USER', 'd36234-db3');
define('DB_PASSWORD', 'NiBoVdgPq');
define('DB_HOST', 'mysqlsemi1.space2u.com');
define('DB_NAME', 'd36234_db3');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn){
    die("Connection failed " . mysqli_connect_error());
}
echo "Connected Successfully";
?>