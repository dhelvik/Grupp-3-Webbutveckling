<?php
include_once 'connection.php';
class DataAccessLayer{
    
    function __counstruct(){}
    
    public function createConnection(){
        $database = new Connection();
        $con = $database->openConnection();
        return $con;
    }

//    public function mapToKarnevalist($result){
//
//    }
//    public function mapToSection($result){
//
//    }
//    public function mapToKarnevalistSection($result){
//
//    }
//    public function mapToUser($result){
//
//    }
    public function setKarnevalist($karnevalist){
           try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Karnevalist VALUES(:firstName,:lastName,:mail,:phoneNumber)');
            $stmt->execute(array(
                ':firstName' => $karnevalist->firstName,
                ':lastName' => $karnevalist->lastName,
                ':mail' => $karnevalist->maill,
                ':phoneNumber' => $karnevalist->phoneNumber
            ));
           }catch(PDOException $e){
               echo 'Error: ' . $e->getMessage();
           }
    }
//    public function getKarnevalist($mail){
//
//    }
    public function setSection($section){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Section VALUES(:sectionName)');
            $stmt->execute(array(
                ':sectionName' => $section->sectionName
            ));
           }catch(PDOException $e){
               echo 'Error: ' . $e->getMessage();
           }
    }
//    public function getSection($sectionName){
//
//    }
    public function setKarnevalistSection($karnevalist, $section){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO KarnevalistSection VALUES(:mail,:sectionName)');
            $stmt->execute(array(
                ':mail' => $karnevalist->maill,
                ':sectionName' => $section->sectionName
            ));
           }catch(PDOException $e){
               echo 'Error: ' . $e->getMessage();
           }
    }
//    public function getKarnevalistSection($karnevalist, $section){
//
//    }
    public function setUser($user){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO User VALUES(:username,:password)');
            $stmt->execute(array(
                ':username' => $user->username,
                ':password' => $user->password
            ));
           }catch(PDOException $e){
               echo 'Error: ' . $e->getMessage();
           }
    }
//    public function getUser($username, $password){
//
//    }
}
?>
