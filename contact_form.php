<?php
// filepath: c:\xampp\htdocs\affiliate_store\contact_form.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'y8233522@gmail.com';
        $mail->Password = 'eudb ylom nupk icfy'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email details
        $mail->setFrom($email, $name);
        $mail->addAddress('paulsachin696@gmail.com'); // Your email
        $mail->Subject = "New Contact Us Message from $name";
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email
        $mail->send();
        echo "<script>
            alert('Your message has been sent successfully!');
            window.location.href = 'index.php';
        </script>";
    } catch (Exception $e) {
        echo "<script>
            alert('Failed to send your message. Error: {$mail->ErrorInfo}');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>