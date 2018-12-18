<?php
include 'connection.php';

class AdminDao{
    public function createConnection()
    {
    
    $database = new Connection();
    $con = $database->openConnection();
    return $con;
}

public function getKarnevalists($search){
    
    try {
        $con = $this->createConnection();
        
        if(isset($search)){
            $stmt = $con->prepare("SELECT Karnevalist.firstName, Karnevalist.lastName, Karnevalist.mail, Karnevalist.phoneNumber, KarnevalistSection.sectionName
                                  FROM KarnevalistSection
                                  INNER JOIN Karnevalist ON KarnevalistSection.mail=Karnevalist.mail
                                  WHERE Karnevalist.firstName LIKE '%' :search '%'
                                  OR Karnevalist.lastName LIKE '%' :search '%'
                                  OR Karnevalist.mail LIKE '%' :search '%'
                                  OR KarnevalistSection.sectionName LIKE '%' :search '%'");
            
            $stmt->execute(array(
                
                ':search' => $search
            ));
            $karnevalister = $stmt->fetchAll();
        }
       else{
            $stmt = $con->prepare("SELECT Karnevalist.firstName, Karnevalist.lastName, Karnevalist.mail, Karnevalist.phoneNumber, KarnevalistSection.sectionName
                                FROM KarnevalistSection
                                INNER JOIN Karnevalist ON KarnevalistSection.mail=Karnevalist.mail
                                ORDER BY mail");
            $stmt->execute();
            $karnevalister = $stmt->fetchAll();
        
    }
    }catch (PDOException $e) {
        throw $e;
    } finally{
        return $karnevalister;
        $con = null;
    }
}
public function updateKarnevalist($firstName, $lastName, $mail, $sectionName){
    
    try{
        $con = $this->createConnection();
        $stmt = $con->prepare("UPDATE Karnevalist SET firstName = :firstName, lastName = :lastName WHERE mail = :mail");
        $stmt->execute(array(
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':mail' => $mail
        ));
    }catch(PDOException $e){
           throw $e;
    }finally{
       // $con=null;
    }
    
    
}
public function deleteKarnevalist($mail){
    try{
        $con = $this->createConnection();
        $stmt = $con->prepare("DELETE FROM Karnevalist WHERE mail = :mail");
        $stmt->execute(array(
            ':mail'=> $mail
        ));
        
    }catch(PDOException $e){
        throw $e;
    }
    
}
}
?>