<?php
include("stylecss.php");
require 'connect_sql.php';
require 'config.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emailSent</title>
</head>

<body class="std-body std-body-text">
    <?php
    echo "<h4>GENISIS Login Username: $loginUserName </h4>";
    echo $myPATH;
    ?>
    <p id="email-confirm">An email has been sent to your VA Email.</p>
    <br>
    <hr>
    <?php
    $forMyLink = password_hash($loginUserName, PASSWORD_DEFAULT);
    $forMyLink = TRIM($forMyLink);
    if (isset($_POST['sendEmail'])) {
        $myVAEmail = $_POST['VAemail'];
        // This is for Link-Click inside your email
        $emailContent = "<h3>Please click this unique link to update your password</h3>
        <a href='$myPATH/newpassword.php'>$forMyLink</a><br><br>";

        // This is for Link-Click at
        /*  
        $emailContent = "<h3>Please click this unique link to update your password</h3>
        <a href='newpassword.php'>$forMyLink</a><br><br>";
        echo $emailContent;
        */

        require 'phpmailer/index.php';
    }
    ?>
    <p>Please check your email and click the link to reset your password.</p>
    <br><br>
</body>

</html>