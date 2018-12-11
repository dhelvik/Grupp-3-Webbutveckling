<?php
<<<<<<< HEAD
include_once 'dataAccessLayer.php';
include_once 'model.php';
//require 'model.php';
echo 'hej bollen';
$karnevalist = new Karnevalist("Björ","Kalle","mail","0768020690");
$dal = new DataAccessLayer();
echo 'hejhej';
$user = $dal->getKarnevalistTest($karnevalist);
echo 'halo';
echo $user->firstName;
//echo 'hejheej';
//$dal->setKarnevalist($karnevalist);
//$dal->getKarnevalist($karnevalist);
//echo 'hejhejehjehej';

=======
include 'dataAccessLayer.php';
include 'model.php';
echo 'hej';
$karnevalist = new Karnevalist("Björ","Kalle","mail2@mail.com","0768020690");
$dal = new DataAccessLayer();
echo $karnevalist;
echo 'hejheej';
//$dal->setKarnevalist($karnevalist);
//$dal->getKarnevalist($karnevalist);
echo $karnevalist->firstName;
>>>>>>> 8751692e475db2b9ab4f0afe4a1850a323d1628d
?>