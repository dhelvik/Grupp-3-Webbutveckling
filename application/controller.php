<?php
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

?>