<?php

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $mail     = $_POST['mail'];
    $location = $_POST['location'];
    $message  = $_POST['message'];

    $mailTo  = "raulratiu2@gmail.com";
    $headers = "From: " . $mail;
    $text    = "You have received an e-mail from " . $name . ".\n\n" . $message;

    mail($mailTo, $location, $text, $headers);
    header("Location: ../contact.php?message=sent");
}

?>
