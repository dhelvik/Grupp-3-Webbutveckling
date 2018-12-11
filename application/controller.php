<?php
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
?>