<?php
include 'dataAccessLayer.php';
include 'model.php';
//require 'model.php';
echo 'hej';
$karnevalist = new Karnevalist("Björ","Kalle","mail@mail.com","0768020690");
$dal = new DataAccessLayer();
echo 'hejheej';
$dal->setKarnevalist($karnevalist);
echo 'hejhejehjehej';
?>