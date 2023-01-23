<?php
require 'vendor/autoload.php';

$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

$from = new SendGrid\Email(null, $email);
$subject = "New contact form submission";
$to = new SendGrid\Email(null, "arsalmalik1920@gmail.com");
$content = new SendGrid\Content("text/plain", "Name: $name\nEmail: $email\n\n$message");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

try {
    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
