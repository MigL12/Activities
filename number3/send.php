<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);



$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'bundac2121418@mkt.ceu.edu.ph'; // Your Gmail email address
$mail->Password = 'miguel';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Set the "From" email address and name
$mail->setFrom('bundac2121418@mkt.ceu.edu.ph', 'miguel');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set the recipient's email address
    $mail->addAddress($to);

    // Set email subject
    $mail->Subject = $subject;

    // Set email message
    $mail->Body = $message;

    try {
        // Send the email
        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}
?>
