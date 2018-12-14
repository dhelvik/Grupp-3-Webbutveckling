<?php
include 'dataAccessLayer.php';
class Controller
{
    public function registerApplication($karnevalist, $section){
        $dal = new DataAccessLayer();
        try {
            if (is_null($dal->getKarnevalist($karnevalist))) {
                $dal->setKarnevalist($karnevalist);
            }
            $dal->setKarnevalistSection($karnevalist, $section);
        } catch (PDOException $e) {
            throw $e;
        }  
    }
    public function registerEntry($entry){
        $dal = new DataAccessLayer();
        try {
            $dal->setEntry($entry);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getEntries(){
        $dal = new DataAccessLayer();
        $entries = $dal->getEntries();
        return $entries;
    }
}
?>