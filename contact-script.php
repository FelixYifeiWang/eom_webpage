<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "admin@dreamin.land";
    $subject = "New Contact Form Submission";
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $headers = "From: " . $email;

    $fullMessage = "Name: $name\nEmail: $email\nMessage:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Thank you for your message!";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
}
?>
