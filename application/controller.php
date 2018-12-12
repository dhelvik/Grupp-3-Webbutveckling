<?php
include 'dataAccessLayer.php';
include 'model.php';
$karnevalist = new Karnevalist("Björ","Kalle","mail","0768020690");
$dal = new DataAccessLayer();
//$dal->setKarnevalist($karnevalist);
$kalle = $dal->getKarnevalist($karnevalist);
echo $kalle->firstName ." " .$kalle->lastName;

?>