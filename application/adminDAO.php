<?php
include 'connection.php';
include 'model.php';
class AdminDao
{

    public function createConnection()
    {
        $database = new Connection();
        $con = $database->openConnection();
        return $con;
    }
    public function mapToQuestion($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch()){
            array_push($a, new Question($row['QID'], $row['name'], $row['mail'], $row['question']));
        }
        return $a;
    }

    public function getKarnevalists($search)
    {
        try {
            $con = $this->createConnection();

            if (isset($search)) {
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
            } else {
                $stmt = $con->prepare("SELECT Karnevalist.firstName, Karnevalist.lastName, Karnevalist.mail, Karnevalist.phoneNumber, KarnevalistSection.sectionName
                                FROM KarnevalistSection
                                INNER JOIN Karnevalist ON KarnevalistSection.mail=Karnevalist.mail
                                ORDER BY mail");
                $stmt->execute();
                $karnevalister = $stmt->fetchAll();
            }
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $karnevalister;
            $con = null;
        }
    }

    public function updateKarnevalist($firstName, $lastName, $mail, $sectionName, $phoneNumber)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("UPDATE Karnevalist SET firstName = :firstName, lastName = :lastName, phoneNumber = :phoneNumber WHERE mail = :mail");
            $stmt->execute(array(
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':mail' => $mail,
                ':phoneNumber' => $phoneNumber
            ));

            $stmt = $con->prepare("UPDATE KarnevalistSection SET sectionName = :sectionName WHERE mail = :mail");
            $stmt->execute(array(

                ':sectionName' => $sectionName,
                ':mail' => $mail
            ));
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con=null;
        }
    }

    public function deleteKarnevalist($mail)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("DELETE FROM Karnevalist WHERE mail = :mail");
            $stmt->execute(array(
                ':mail' => $mail
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getAllQuestions(){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT * FROM Question");
            $stmt->execute();
            $q = $this->mapToQuestion($stmt);
            return $q;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteQuestion($QID){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("DELETE FROM Question where QID = :QID");
            $stmt->execute(array(
                ':QID' => $QID
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function addEventsInfoToDB($heading, $eventInfo, $imgName, $imgPath){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Aside (heading, eventInfo, imgName, imgPath) VALUES(:heading, :eventInfo, :imgName, :imgPath)');
            $stmt->execute(array(
                ':heading' => $heading,
                ':eventInfo' => $eventInfo,
                ':imgName' => $imgName,
                ':imgPath' => $imgPath
            ));
        } catch (PDOException $e) {
            throw $e;
        }
        finally {
            $con = null;
        }
        
    }
    public function addPostToDB($heading, $postText, $imgName, $imgPath){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Post (heading, postText, imgName, imgPath) VALUES(:heading, :postText, :imgName, :imgPath)');
            $stmt->execute(array(
                ':heading' => $heading,
                ':postText' => $postText,
                ':imgName' => $imgName,
                ':imgPath' => $imgPath
            ));
        } catch (PDOException $e) {
            throw $e;
        }
        finally {
            $con = null;
        }
        
    }
}
?>