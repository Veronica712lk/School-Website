<?php
// Path to the PHPMailer class files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Load PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'mumba2022chikumbi@gmail.com';  // SMTP username
        $mail->Password = 'tkwg zrzp yoge rpcz';  // SMTP password (app password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('mumba2022chikumbi@gmail.com');  // Recipient email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = "<p><strong>Name:</strong> $name</p><p><strong>Email:</strong> $email</p><p><strong>Message:</strong></p><p>$message</p>";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

       // Send the email
       $mail->send();

       // Display a styled confirmation message
       echo '<div style="padding: 20px; background-color: #007bff;  color: white; border-radius: 5px; font-family: Arial, sans-serif; max-width: 400px; margin: 20px auto; text-align: center;">
               <strong>Success!</strong> Your message has been sent successfully. Please be patient as you await your response.
             </div>';
   } catch (Exception $e) {
       echo '<div style="padding: 20px; background-color: #f44336; color: white; border-radius: 5px; font-family: Arial, sans-serif; max-width: 400px; margin: 20px auto; text-align: center;">
               <strong>Error!</strong> Message could not be sent. Please check your internet connection or try again later. Mailer Error: ' . $mail->ErrorInfo . '
             </div>';
   }
}
?>
