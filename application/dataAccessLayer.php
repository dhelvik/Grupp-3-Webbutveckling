<?php
include 'connection.php';

class DataAccessLayer
{
    
    public function createConnection()
    {
        $database = new Connection();
        $con = $database->openConnection();
        return $con;
    }

    public function mapToKarnevalist($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch())
            array_push($a, new Karnevalist($row['firstName'], $row['lastName'], $row['mail'], $row['phoneNumber']));
        return (sizeof($a) <= 1 ? $a[0] : $a);
    }

    public function mapToSection($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch()){
            echo $row['sectionName'];
            array_push($a, new Section($row['sectionName']));
        }
        return (sizeof($a) <= 1 ? $a[0] : $a);
    }

    public function mapToKarnevalistSection($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch())
            array_push($a, new KarnevalistSection($row['mail'], $row['sectionName']));
        return (sizeof($a) <= 1 ? $a[0] : $a);
    }

    public function mapToUser($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch())
            array_push($a, new User($row['username'], $row['password']));
        return (sizeof($a) <= 1 ? $a[0] : $a);
    }
    public function mapToEntry($stmt)
    {
        $a = array();
        while ($row = $stmt->fetch())
            array_push($a, new Entry($row['name'], $row['email'], $row['comment'], $row['datetime']));
            return (sizeof($a) <= 1 ? $a[0] : $a);
    }
    
    public function setKarnevalist($karnevalist)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Karnevalist VALUES(:firstName,:lastName,:mail,:phoneNumber)');
            $stmt->execute(array(
                ':firstName' => $karnevalist->firstName,
                ':lastName' => $karnevalist->lastName,
                ':mail' => $karnevalist->mail,
                ':phoneNumber' => $karnevalist->phoneNumber
            ));
        } catch (PDOException $e) {
            throw $e;
            
        } finally{
            $con = null;
        }
    }

    public function getKarnevalist($karnevalist)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM Karnevalist WHERE mail = :mail');
            $stmt->execute(array(
                ':mail' => $karnevalist->mail
            ));
            $karnevalist = $this->mapToKarnevalist($stmt);
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $karnevalist;
            $con = null;
        }
    }

    public function setSection($section)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Section VALUES(:sectionName)');
            $stmt->execute(array(
                ':sectionName' => $section->sectionName
            ));
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con = null;
        }
    }

    public function getSection()
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT sectionName FROM Section');
            $stmt->execute();
            $section = $stmt->fetchAll();
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $section;
            $con = null;
        }
    }
    
    public function getRemainingVacancies($sectionName){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT(SELECT numOfVacancies FROM Section WHERE sectionName = :sectionName)-(SELECT COALESCE(COUNT(mail), 0) FROM KarnevalistSection WHERE sectionName = :sectionName) as vacancies");
            $stmt->execute(array(
                ':sectionName' => $sectionName,
            ));
            $num = $stmt->fetch();
        } catch (PDOException $e) {
            throw $e;;
        } finally{
            return $num['vacancies'];
            $con = null;
        }
    }

    public function setKarnevalistSection($karnevalist, $section)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO KarnevalistSection VALUES(:mail,:sectionName)');
            $stmt->execute(array(
                ':mail' => $karnevalist->mail,
                ':sectionName' => $section->sectionName
            ));
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con = null;
        }
    }

    public function getKarnevalistSection($karnevalist, $section)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT * FROM KarnevalistSection WHERE mail = :mail AND sectionName = :sectionName');
            $stmt->execute(array(
                ':mail' => $karnevalist->mail,
                ':sectionName' => $section->sectionName
            ));
            $karevalistSection = $this->mapToKarnevalistSection($stmt);
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $karevalistSection;
            $con = null;
        }
    }

    public function setUser($user)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO User VALUES(:username,:password)');
            $stmt->execute(array(
                ':username' => $user->username,
                ':password' => $user->password
            ));
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con = null;
        }
    }

    public function getUser($user)
    {       
        try {
            $con = $this->createConnection(); 
            $stmt = $con->prepare('SELECT * FROM User WHERE username = :username AND password =:password');
            $stmt->execute(array(
                ':username' => $user->username,
                ':password' => $user->password
            ));
            $user = $this->mapToUser($stmt);
        } catch (PDOException $e) {
           throw $e;
        } finally{
            return $user;
            $con = null;
        }
    }
    public function setEntry($entry)
    {
        try {
            $con = $this->createConnection();   
            $stmt = $con->prepare('INSERT INTO Entry(name, email, comment, datetime) VALUES(:name,:email,:comment,:datetime)');
            $stmt->execute(array(
                ':name' => $entry->name,
                ':email' => $entry->email,
                ':comment' => $entry->comment,
                ':datetime' => $entry->datetime
            ));
           
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con = null;
        }
    }
    public function getEntries()
    {       
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT name, comment FROM Entry ORDER BY datetime DESC LIMIT 10');
            $stmt->execute();
            $entries = $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $entries;
            $con = null;
        }
    }
    public function getEventTypes(){
        try{
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT DISTINCT eventName from Event');
            $stmt->execute();
            $eventTypes = $stmt->fetchAll();
            
        }   catch (PDOException $e) {
            throw $e;
        } finally{
            return $eventTypes;
            $con = null;
        }
    }   

    public function getEventsForType($eventName)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT * FROM Event WHERE eventName = :eventName");
             $stmt->execute(array(
                ':eventName' => $eventName,
            ));
            
            $events = $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $events;
            $con = null;
        }
    }
    
    public function getEventsForTypeDate($eventName, $eventDate)
    {
        
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT e.eventName, e.date, e.time, (e.maxCapacity-
                                     (SELECT COALESCE(SUM(ticketQuantity),0) FROM ticket t WHERE e.eventName = t.eventName AND t.eventDate = e.date AND t.eventTime = e.time)) as remainingTickets
FROM Event e WHERE e.eventName = :eventName AND e.date = :eventDate");
            $stmt->execute(array(
                ':eventName' => $eventName,
                ':eventDate' => $eventDate,
            ));
            
            $events = $stmt->fetchAll();
            
        } catch (PDOException $e) {
            throw $e;
        } finally{
            return $events;
            $con = null;
        }
    }
    public function reserveTickets($customerName, $customerEmail, $customerPhoneNbr, $eventName, $eventDate, $eventTime, $ticketQuantity)
    {       
        try {
            $con = $this->createConnection();
            if($this->getCustomer($customerEmail)){
            $stmt = $con->prepare("INSERT INTO Customer VALUES(:name,:email, :phoneNumber)");
            $stmt->execute(array(
                ':name' => $customerName,
                ':email' => $customerEmail,
                ':phoneNumber' => $customerPhoneNbr,
               
            )); 
            }
            $stmt = $con->prepare("INSERT INTO Ticket VALUES(:customerEmail,:eventName,:eventDate,:eventTime,:ticketQuantity)");
            $stmt->execute(array(
                ':customerEmail' => $customerEmail,
                ':eventName' => $eventName,
                ':eventDate' => $eventDate,
                ':eventTime' => $eventTime,
                ':ticketQuantity' => $ticketQuantity,
            ));   
        } catch (PDOException $e) {
            throw $e;
        } finally{
            $con = null;
        }
    }
   
   public function getCustomer($customerEmail)
    {
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT * FROM Customer WHERE email = :email");
            $stmt->execute(array(
                ':email' => $customerEmail,
            ));
            if($stmt->rowCount()>0){
                return false;
            } else{
                return true;
            }
        } catch (PDOException $e) {
            throw $e;;
        } finally{
            $con = null;
        }
    }
    public function getRemainingSeats($eventName, $eventDate, $eventTime){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare("SELECT(SELECT maxCapacity FROM Event WHERE eventName = :eventName)-(SELECT SUM(ticketQuantity)FROM Event WHERE eventName = :eventName AND eventDate = :eventDate AND eventTime = :eventTime)");
            $stmt->execute(array(
                ':eventName' => $eventName,
                ':eventDate' => $eventDate,
                ':eventTime' => $eventTime,
            ));
            echo $stmt->fetchAll();
        } catch (PDOException $e) {
            throw $e;;
        } finally{
            $con = null;
        }
    }
    public function registerQuestion($name, $mail, $question){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('INSERT INTO Question(name, mail, question) VALUES(:name, :mail, :question)');
            $stmt->execute(array(
                ':name' => $name,
                ':mail' => $mail,
                ':question' => $question
            ));
        } catch (PDOException $e) {
            throw $e;
        }
        finally {
            $con = null;
        }
    }
    public function getAside(){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT heading, eventInfo, imgPath FROM Aside ORDER BY id DESC LIMIT 3');
            $stmt->execute();
            $aside = $stmt->fetchAll();
            return $aside;
        } catch (PDOException $e) {
            throw $e;
        }
        finally {
            $con = null;
        }
    }
    public function getPosts(){
        try {
            $con = $this->createConnection();
            $stmt = $con->prepare('SELECT heading, postText, imgPath FROM Post ORDER BY id DESC LIMIT 3');
            $stmt->execute();
            $posts = $stmt->fetchAll();
            return $posts;
        } catch (PDOException $e) {
            throw $e;
        }
        finally {
            $con = null;
        }
    }
}
?>