<?php
// include 'dataAccessLayer.php';
include 'controller.php';
// $dal=new DataAccessLayer();
// $dal->getRemainingVacancies('Adminsterit');
// $sec = $dal->getSection();
$con = new Controller();
$img = $con->getImgPath();
var_dump($img);
// var_dump($sections);
// foreach ($sections as $value) {
//     echo $value->sectionName;
// }
?>
