<?php
// require 'includes/PHPMailerAutoload.php'; 
// supposed above-line can repalce next two lines, but not working
require 'includes/class.phpmailer.php';
require 'includes/class.smtp.php';

$mail = new PHPMailer;

$mail->isSMTP();                 // localhost MUST use SMTP; otherwise disable it
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->Port = 587;               // TCP port to connect to
$mail->SMTPAuth = true;          // Enable SMTP authentication
$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted

$mail->Username = 'hzwang2008@gmail.com';                 // SMTP username
$mail->Password = 'sisu022337!';                           // SMTP password

$mail->setFrom('hzwang2008@gmail.com', 'henry');   // Sender's email, where-from
$mail->addAddress($myVAEmail);       // Add a recipient, where-to
$mail->addReplyTo('hzwang2008@gmail.com');         // Add a recipient, where-to

$body = $emailContent;
$mail->isHTML(true);                               // Set email format to HTML
$mail->Subject = 'This email sent for test only';
$mail->Body    = $body;
$mail->AltBody = strip_tags($body);

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'An email has been sent out.';
}
$mail->smtpClose();
