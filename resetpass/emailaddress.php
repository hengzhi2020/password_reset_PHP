<?php
include("stylecss.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PasswordReset</title>
</head>

<body class="std-body">
    <div class="std-body-text">
        <?php
        $username = apache_request_headers()['x-remote-user'];
        echo "<h4>GENISIS Login Username: $username</h4>";
        ?>
        <p id="email-head">Self-Service Password-Reset</p>
        <p>If you forgot your Geneisis password or just want to reset it, please enter your email address and click the button.</p>
        <form action="/resetpass/emailsentout.php" method="POST">
            <label for="email">Enter your VA email:</label>
            <input type="email" id="email" name="email">
            <input type="submit" class="std-button">
        </form>
        <p>When you receive the email, click the link inside to complete the password reset.</p>
    </div>

</body>

</html>