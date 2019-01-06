<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

function sendEmailTickets($customerName, $customerEmail, $eventName, $eventDate, $eventTime, $ticketQuantity)
{
    $mailer = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        // Server settings
        $mailer->SMTPDebug = 2; // Enable verbose debug output
        $mailer->isSMTP(); // Set mailer to use SMTP
        $mailer->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = 'lundakarnevalengrupp3@gmail.com'; // SMTP username
        $mailer->Password = 'Grupp3123'; // SMTP password
        $mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = 587; // TCP port to connect to

        // Recipients
        $mailer->setFrom('lundakarnevalengrupp3@gmail.com', 'Lundakarnevalen Grupp 3');
        $mailer->addAddress($customerEmail); // Name is optional

        // Content
        $mailer->isHTML(true);
        // Set email format to HTML
        $mailer->Subject = 'Dina reserverade billjetter till ' . $eventName;
        $mailer->CharSet = 'UTF-8';

        $mailer->Body = '<img left-margin="50%" src="https://www.lundakarnevalen.se/wp-content/themes/Imaginal-WPtheme/img/logo/footerXX.png" height="50px" width="auto">
<h1 align="center">
Tack för din reservation!
</h1>
<p align="center">
Bifogat finner du informationen för det event du valt att reservera till.
</p>
<br>
<p align="center">
' . $eventName . " " . $eventDate . " " . $eventTime . '
</p>
<br>
<p align="center">
Reservationen gäller för x st biljetter. Kom ihåg att komma ca 15 minuter innan föreställningen börjar
</p>';
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();

        // echo 'Message has been sent';
    } catch (Exception $e) {
        throw $mailer->ErrorInfo;
    }
}
function sendEmailFAQ($answer, $mail)
{
    $mailer = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        // Server settings
        $mailer->SMTPDebug = 2; // Enable verbose debug output
        $mailer->isSMTP(); // Set mailer to use SMTP
        $mailer->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = 'lundakarnevalengrupp3@gmail.com'; // SMTP username
        $mailer->Password = 'Grupp3123'; // SMTP password
        $mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = 587; // TCP port to connect to
        
        // Recipients
        $mailer->setFrom('lundakarnevalengrupp3@gmail.com', 'Lundakarnevalen Grupp 3');
        $mailer->addAddress($mail); // Name is optional
        
        // Content
        $mailer->isHTML(true);
        // Set email format to HTML
        $mailer->Subject = 'Svar på din fråga';
        $mailer->CharSet = 'UTF-8';
        
        $mailer->Body = '<img left-margin="50%" src="https://www.lundakarnevalen.se/wp-content/themes/Imaginal-WPtheme/img/logo/footerXX.png" height="50px" width="auto">
<h1 align="center">
Tack för ditt meddelande!
</h1>
<p align="center"> '. $answer . '<br> Med vänliga hälsningar, Lundakarnevalen!
</p>';
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mailer->send();
        
        // echo 'Message has been sent';
    } catch (Exception $e) {
        throw $mailer->ErrorInfo;
    }
}
function sendAdminEmail($message, $emails)
{
    $mailer = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        
       
        // Server settings
        $mailer->SMTPDebug = 2; // Enable verbose debug output
        $mailer->isSMTP(); // Set mailer to use SMTP
        $mailer->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = 'lundakarnevalengrupp3@gmail.com'; // SMTP username
        $mailer->Password = 'Grupp3123'; // SMTP password
        $mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = 587; // TCP port to connect to
        
        // Recipients
        $mailer->setFrom('lundakarnevalengrupp3@gmail.com', 'Lundakarnevalen Grupp 3');
        foreach($emails as $email){
            $mailer->addAddress($email);
        }
        
        // Content
        $mailer->isHTML(true);
        // Set email format to HTML
        $mailer->Subject = 'Meddelande till Karnevalist';
        $mailer->CharSet = 'UTF-8';
        
        $mailer->Body = '<img left-margin="50%" src="https://www.lundakarnevalen.se/wp-content/themes/Imaginal-WPtheme/img/logo/footerXX.png" height="50px" width="auto">
<h1 align="center">
Kära Karnevalist!
</h1>
<p align="center"> '. $message . '<br> Med vänliga hälsningar, Lundakarnevalen!
</p>';
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mailer->send();
        
        // echo 'Message has been sent';
    } catch (Exception $e) {
        throw $mailer->ErrorInfo;
    }
}
?>