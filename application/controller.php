<?php
include 'dataAccessLayer.php';
class Controller
{
    public function registerApplication($karnevalist, $section){
        try {
            $dal = new DataAccessLayer();
            $dal->setKarnevalist($karnevalist);
            $dal->setKarnevalistSection($karnevalist, $section);
        } catch (PDOException $e) {
            throw $e;
        }
        
    }
}
?>