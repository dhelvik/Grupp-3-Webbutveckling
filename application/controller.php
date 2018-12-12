<?php
include 'dataAccessLayer.php';
class Controller
{
    public function registerApplication($karnevalist, $section){
        $dal = new DataAccessLayer();
        if(is_null($dal->getKarnevalistSection($karnevalist, $section))){
            if(is_null($dal->getKarnevalist($karnevalist))) {
                $dal->setKarnevalist($karnevalist);
                $dal->setKarnevalistSection($karnevalist, $section);
            }else{
                $dal->setKarnevalistSection($karnevalist, $section);
            }
        }else{
            return null;
        }
    }
}
?>