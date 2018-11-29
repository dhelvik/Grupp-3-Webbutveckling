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

//mysqli_query($conn, "create table Customer (  username varchar(255), password varchar(255));");
//mysqli_query($conn, "delete from Customer");
//mysqli_query($conn, "insert into Customer values ('Daniel', 'nisse123')");

//$result = mysqli_query($conn, "select * from Customer");
$result = mysqli_query($conn, "SELECT * FROM INFORMATION_SCHEMA.TABLES");

while($row = mysqli_fetch_array($result)){
	echo '<br>Table Name= ' .$row['TABLE_NAME'].'<br>'.'Table Type= '.$row['TABLE_TYPE'];
  	}


mysqli_close($conn);

?>