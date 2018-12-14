<?php
class Karnevalist{
    public $firstName;
    public $lastName;
    public $mail;
    public $phoneNumber;
    
    
    public function __construct($firstName, $lastName, $mail, $phoneNumber){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mail = $mail;
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
        $this->sectionName = $sectionName;
    }
}
class User{
    public $username;
    public $password;
    
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;    
    }
}
class Entry{
    public $name;
    public $email;
    public $comment;
    public $datetime;
    
    public function __construct($name, $email, $comment, $datetime){
        $this->name = $name;
        $this->email = $email;
        $this->comment = $comment;
        $this->datetime = $datetime;
    }
}
?>