<?php
// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create PHPMailer instance
    $mail = new PHPMailer(true);  // Enable exceptions

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set SMTP host
        $mail->SMTPAuth = true;          // Enable SMTP authentication
        $mail->Username = 'abhisheksolanki030@gmail.com';  // Your Gmail address
        $mail->Password = 'dsbn lqek bjsi huex';         // Your Gmail password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
        $mail->Port = 587;  // Use port 587 for TLS


        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('your-email@example.com', 'Your Name');  // Add recipient email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from ' . $name;
        $mail->Body    = 'Message: ' . $message;

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
