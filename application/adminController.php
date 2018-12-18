<?php
include 'adminDAO.php';

class AdminController
{
    public function getKarnevalists($search){
       
        try{
        $dao = new AdminDao();
        return $dao->getKarnevalists($search);
        
        }catch(PDOException $e){
            throw $e;
            
        }
    }
    public function updateKarnevalist($firstName, $lastName, $mail, $sectionName){
        try{
            $dao = new AdminDao();
            $dao->updateKarnevalist($firstName, $lastName, $mail, $sectionName);
        }catch(PDOException $e){
            throw $e;
            
        }
    }
    public function deleteKarnevalist($mail){
        try{
            $dao = new AdminDao();
            $dao->deleteKarnevalist($mail);
        }catch(PDOException $e){
            throw $e;
        }
    }
        
}
?>