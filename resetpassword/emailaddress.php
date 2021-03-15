<?php
include("stylecss.php");
require 'connect_sql.php';
require 'config.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PasswordReset</title>
</head>

<body class="std-body">
    <div class="std-body-text">
        <?php
        echo "<h4>GENISIS Login Username: $loginUserName</h4>";
        ?>
        <p id="email-head">Self-Service Password-Reset</p>
        <p>If you forgot your Geneisis password or just want to reset it, please enter your email address and click the button.</p>
        <form action="<?php $myPATH ?>emailsentout.php" method="POST">
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="VAemail">
            <input type="submit" class="std-button" name="sendEmail" value="Send">
        </form>
        <p>When you receive the email, click the link inside to complete the password reset.</p>
    </div>

</body>

</html>