<?php
class Karnevalist{
    public $firstName;
    public $lastName;
    public $maill;
    public $phoneNumber;
    
    public function __construct($firstName, $lastName, $mail, $phoneNumber){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->maill = $mail;
        $this->phoneNumber = $phoneNumber;
    }
}
class KarnevalistSection{
    public $mail;
    public $sectionName;
    
        public function __construct($mail, $sectionName){
        $this->mail = $mail;
        $this->sectionName = $sectionName;
    }
}
class Section{
    public $sectionName;
    
    public function __construct($sectionName){
        $this->section = $sectionName;
    }
}
class User{
    public $username;
    public $password;
    
    public function __construcr($username, $password){
        $this->username = username;
        $this->password = password;    
    }
}
?>

