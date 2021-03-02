<?php
include("stylecss.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailSent</title>
</head>

<body class="std-body std-body-text">
    <?php
    $username = apache_request_headers()['x-remote-user'];
    echo "<h4>GENISIS Login Username: $username</h4>";
    ?>
    <p id="email-confirm">A new email has been sent to your email.</p>
    <p>Please check your email and click the link to reset your password.</p>
    <br><br>
    <div class="send-email">
        <hr>
        <p>The following Link is supposed to be shown inside the email, here for dev purpose only </p>
        <a href="/resetpass/newpassword.php" class="std-link"> Link-link-link-link-Link --- shown inside your VA email</a><br>

    </div>


</body>

</html>