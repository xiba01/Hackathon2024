<?php
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (!function_exists('sendMail')) {
    function sendMail($email) {
        $message = "Nous avons le plaisir de vous informer que votre compte sur OFPPTCA.com a été approuvé avec succès. Vous pouvez désormais vous connecter à votre compte à tout moment en utilisant vos identifiants.";
        
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;         // Enable SMTP authentication
            $mail->Username = 'ofppt.c.a@gmail.com'; // SMTP username
            $mail->Password = 'ijfz bdyr lggy cjxn';   // SMTP password, use your App Password here
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also accepted
            $mail->Port = 587;              // TCP port to connect to

            //Recipients
            $mail->setFrom('ofppt.c.a@gmail.com', 'OFPPT.C.A');
            $mail->addAddress($email);       // Add a recipient
            $mail->addReplyTo('ofppt.c.a@gmail.com', 'OFPPT.C.A');

            // Content
            $mail->isHTML(true);             // Set email format to HTML
            $mail->Subject = 'Approbation de votre compte sur OFPPTCA.com';
            $mail->Body    = $message;
            $mail->AltBody = $message;

            // Send the email
            $mail->send();
            return true;
        } catch (Exception $e) {
            // Log the error if email sending failed
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}
?>
