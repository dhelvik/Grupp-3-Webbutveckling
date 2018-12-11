<?php
include "dataAccessLayer.php";
include "model.php";
$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$mail = $_POST["epost"];
$phoneNumber = $_POST["telefonnummer"];
$section = $_POST["poster"];

echo $firstName ;
echo $lastName;
echo $mail;
echo $phoneNumber;
echo $section;

$karnevalist = new Karnevalist($firstName, $lastName, $mail, $phoneNumber);
echo "hejhej";
echo $karnevalist->firstName;
$dal = new DataAccessLayer();
//$dal->setKarnevalist(new Karnevalist($firstName, $lastName, $mail, $phoneNumber));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
echo "hej";

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

/*$mailer = new PHPMailer(true);                              // Passing `true` enables exceptions
echo "Haj";
try {
    //Server settings
    $mailer->SMTPDebug = 2;                                 // Enable verbose debug output
    $mailer->isSMTP();                                      // Set mailer to use SMTP
    $mailer->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mailer->SMTPAuth = true;                               // Enable SMTP authentication
    $mailer->Username = 'userNAME';                 // SMTP username
    $mailer->Password = 'PASSWORD';                           // SMTP password
    $mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mailer->Port = 587;                                    // TCP port to connect to
    
    //Recipients
    $mailer->setFrom('from@example.com', 'Mailer');
    $mailer->addAddress('daniel.helvik@me.com');               // Name is optional
    

    
    //Content
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject = 'Here is the subject';
    $mailer->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mailer->send();
    
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mailer->ErrorInfo;
}*/