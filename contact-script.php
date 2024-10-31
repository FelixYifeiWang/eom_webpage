<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Or use Amazon SES SMTP if preferred
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@dreamin.land';
        $mail->Password = 'DreamIn2022';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('admin@dreamin.land'); // Your receiving email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = 'Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . nl2br($_POST['message']);

        // Save the message to local file
        $directory = __DIR__ . '/msgs/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Create the directory if it doesn't exist
        }

        // Generate a unique filename using the current timestamp and sanitized email
        $filename = $directory . date('Y-m-d_H-i-s') . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $_POST['email']) . '.txt';

        // Prepare message content for saving
        $messageContent = "Name: " . $_POST['name'] . "\n";
        $messageContent .= "Email: " . $_POST['email'] . "\n";
        $messageContent .= "Message:\n" . $_POST['message'];

        // Write message to the file
        file_put_contents($filename, $messageContent);

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
