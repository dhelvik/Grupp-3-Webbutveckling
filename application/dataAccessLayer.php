<?php
include_once 'connection.php';
class DataAccessLayer{
    
    public function createConnection(){
        $database = new Connection();
        $con = $database->openConnection();
        return $con;
    }

//    public function mapToKarnevalist($stmt){
//        while($stmt->fetch()){
//            
//        }
//    }
//    public function mapToSection($stmt){
//
//    }
//    public function mapToKarnevalistSection($stmt)){
//
//    }
//    public function mapToUser($stmt){
//
//    }
    public function setKarnevalist($karnevalist){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Karnevalist VALUES(:firstName,:lastName,:mail,:phoneNumber)');
            $stmt->execute(array(
                ':firstName' => $karnevalist->firstName,
                ':lastName' => $karnevalist->lastName,
                ':mail' => $karnevalist->mail,
                ':phoneNumber' => $karnevalist->phoneNumber
            ));
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
    public function getKarnevalist($karnevalist){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM Karnevalist WHERE mail = :mail');
            $stmt->execute(array(':mail' => $karnevalist->mail));
                while($row = $stmt->fetch()) {
                    print_r($row);
                }
        }catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
    public function setSection($section){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Section VALUES(:sectionName)');
            $stmt->execute(array(
                ':sectionName' => $section->sectionName
            ));
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
    public function getSection($sectionName){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM Section WHERE sectionName = :sectionName');
            $stmt->execute(array(':sectionName' => $section->sectionName));
                while($row = $stmt->fetch()) {
                    print_r($row);
                }
          }catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
    public function setKarnevalistSection($karnevalist, $section){
        try{ 
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO KarnevalistSection VALUES(:mail,:sectionName)');
            $stmt->execute(array(
                ':mail' => $karnevalist->mail,
                ':sectionName' => $section->sectionName
            ));
           }catch(PDOException $e){
               echo 'Error: ' . $e->getMessage();
           }finally{
            $con->closeConnection();
        }
    }
    public function getKarnevalistSection($karnevalist, $section){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM KarnevalistSection WHERE mail = :mail AND sectionName = :sectionName');
            $stmt->execute(array(
                ':mail' => $karnevalist->mail,
                ':sectionName' => $section->sectionName
            ));
                while($row = $stmt->fetch()) {
                    print_r($row);
                }
          }catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
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
           }finally{
            $con->closeConnection();
        }
    }
    public function getUser($user){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM User WHERE username = :username');
            $stmt->execute(array(':username' => $user->username));
                while($row = $stmt->fetch()) {
                    print_r($row);
                }
        }catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
        }finally{
            $con->closeConnection();
        }
    }
}
?>
