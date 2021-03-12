<?php
include("stylecss.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>addButton</title>

</head>

<body class="std-body">
    <div class="send-email">
        <form action="/resetpassword/emailaddress.php"><br>
            <button type="submit" id="cmp-button">
                <i class='fas fa-edit' style='font-size:36px;color:#007A7C;margin-top:50px;'></i><br>
                <h2 class="std-body-text">Password-Reset</h2>
                <p class="std-body-text" style='margin-top:-12px;'>Self-Service to Reset GENISIS Password</p>
            </button>
        </form><br>
        <p>NOTE: This button-component is designed to be added inside The GenHub => Resources & Help =></p>
    </div>
</body>

</html>