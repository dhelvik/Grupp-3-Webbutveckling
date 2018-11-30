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
//    public function setSection($sectionName){
//        try{
//            $con = createConnection();
//            $stmt = $con->prepare('INSERT INTO SECTION VALUES(:sectionName)');
//            $stmt->execute(array(
//                ':sectionName' => $sectionName
//            ));
//        }catch{}
//    }
//    public function getSection($sectionName){
//
//    }
//    public function setKarnevalistSection($karnevalist, $section){
//        try{
//            $con = createConnection();
//            $stmt = $con->prepare('INSERT INTO KARNEVALISTSECTION VALUES(:mail, :section)');
//            $stmt->execute(array(
//                ':mail' => $karnevalist['mail'],
//                ':section' => $section['sectionName']
//            ));
//        }catch{}
//    }
//    public function getKarnevalistSection($karnevalist, $section){
//
//    }
//    public function setUser($user){
//        try{
//            $con = createConnection();
//            $stmt = $con->prepare('INSERT INTO USER VALUES(:username, :password)');
//            $stmt->execute(array(
//                ':username' => $user['user'],
//                ':lastName' => $user['password'],
//            ));
//        }catch{}
//    }
//    public function getUser($username, $password){
//
//    }
//    try{
//        $database = new Connection();
//        $db = $database->openConnection();
//        $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES" ;
// 
//        foreach ($db->query($sql) as $row) {
//            echo " ID: ".$row['TABLE_NAME'] . "<br>";
//            echo " Name: ".$row['TABLE_TYPE'] . "<br>"; 
//        }
//        $db->closeConnection();
//    }
//    catch (PDOException $e){
//        echo "There is some problem in connection: " . $e->getMessage();
//    }
}
?>
