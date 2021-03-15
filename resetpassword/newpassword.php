<?php
include("stylecss.php");
require 'connect_sql.php';
require 'config.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset-Password</title>
</head>

<body class="std-body std-body-text">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div>
        <?php
        echo "<h4>GENISIS Login Username: $loginUserName</h4>";
        /* 
        if (!!$myOldPassword) {
            echo "<h4>GENISIS my Old Password: $myOldPassword</h4>";
        } else {
            echo "<h4>GENISIS my Old Password: is NONE</h4>";
        }
        */
        ?>
        <form action='<?php $myPATH ?>newpassword.php' method="POST">
            <table align="center">
                <p align="center" id="reset-head">Reset Your Password</p>
                <tr>
                    <td class="enter-pass-row">Enter New Password</td>
                    <td class="enter-pass-row"><input type="password" id="newpass" name="newpass" placeholder="Type new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '?']).{14,32}" title="Must Match All Listed Conditions" value='' required></td>
                </tr>
                <tr>
                    <td class="enter-pass-row">Confirm New Password</td>
                    <td class="enter-pass-row"><input type="password" id="confirmpass" name="confirmpass" placeholder="Repeat the password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '?']).{14,32}" title="Must Match All Listed Conditions" value='' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right" class="enter-pass-row"><input type="submit" name="sentout" value="Send" class="std-button"></td>
                </tr>
            </table>
        </form>
    </div>

    <div id="message1">
        <h3>Password must contain the following:</h3>
        <p id="number" class="invalid">A number</p>
        <p id="letter" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A capital (uppercase) letter</p>
        <p id="minlength" class="invalid">Minimum 14 characters</p>
        <p id="maxlength" class="invalid">Maximum 32 characters</p>
        <p id="specials" class="invalid">A special character (!, @, #, $, %, ^, &, *, (, ), <,>, ?)</p>
    </div>
    <div id="message2">
        <h3>Password must be confirmed before the reset:</h3>
        <p id="not_oldpsw" class="invalid">Not the same as your old password</p>
        <p id="not_login" class="invalid">Not the same as your GENISIS login username</p>
        <p id="confirmed" class="invalid">New password confirmed. Please click "Send" to reset your password.</p>
    </div>

    <script>
        var myInput1 = document.getElementById("newpass");
        var myInput2 = document.getElementById("confirmpass");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var minlength = document.getElementById("minlength");
        var maxlength = document.getElementById("maxlength");
        var confirmed = document.getElementById("confirmed");

        // When the user clicks on the password field, show the message1 box
        myInput1.onfocus = () => {
            document.getElementById("message1").style.display = "block";
        }
        myInput2.onfocus = () => {
            document.getElementById("message2").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message1 box
        myInput1.onblur = () => {
            document.getElementById("message1").style.display = "none";
        }
        myInput2.onblur = () => {
            document.getElementById("message2").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput1.onkeyup = () => {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput1.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput1.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput1.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput1.value.length >= 14) {
                minlength.classList.remove("invalid");
                minlength.classList.add("valid");
            } else {
                minlength.classList.remove("valid");
                minlength.classList.add("invalid");
            }

            if (myInput1.value.length < 33 && myInput1.value.length != 0) {
                maxlength.classList.remove("invalid");
                maxlength.classList.add("valid");
            } else {
                maxlength.classList.remove("valid");
                maxlength.classList.add("invalid");
            }

            // Validate special characters
            var specialchars = /['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '?']/g
            if (myInput1.value.match(specialchars)) {
                specials.classList.remove("invalid");
                specials.classList.add("valid");
            } else {
                specials.classList.remove("valid");
                specials.classList.add("invalid");
            }
        }

        myInput2.onkeyup = () => {

            // Validate not-the-login-username
            if (!!myInput2.value && myInput2.value !== '<?php echo $loginUserName ?>') {
                not_login.classList.remove("invalid");
                not_login.classList.add("valid");
            } else {
                not_login.classList.remove("valid");
                not_login.classList.add("invalid");
            }

            // Validate not-the-old-password
            if (!!myInput2.value && myInput2.value !== '<?php echo $myOldPassword ?>') {
                not_oldpsw.classList.remove("invalid");
                not_oldpsw.classList.add("valid");
            } else {
                not_oldpsw.classList.remove("valid");
                not_oldpsw.classList.add("invalid");
            }

            // Repeat entering the password, confirmed the same one
            if (!!myInput2.value && myInput2.value === myInput1.value) {
                confirmed.classList.remove("invalid");
                confirmed.classList.add("valid");

            } else {
                confirmed.classList.remove("valid");
                confirmed.classList.add("invalid");
            }
        }
    </script>

    <?php

    if (isset($_POST['sentout'])) {

        $myNewPassword = $_POST['newpass'];
        // echo ("New Password - Input: $myNewPassword <br>");
        $hashedNewPass = password_hash($myNewPassword, PASSWORD_DEFAULT);
        // echo ("New Password - Hashed: $hashedNewPass <br>");

        if ((!password_verify($myNewPassword, $myOldPassword)) && ($myNewPassword !== $loginUserName) && ($myNewPassword === $_POST['confirmpass'])) {
            if (!!$hashedNewPass && $myOldPassword === "noPasswordStored") {
                // INSERT a new record, with user_name and password
                $sql_insert = "INSERT INTO users (user_name, password) VALUES ('$loginUserName', '$hashedNewPass')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo ('<script>alert("New password was created successfully")</script>');
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                };
            }
            if (!!$hashedNewPass && $myOldPassword !== "noPasswordStored") {
                // UPDATE a user's password, with a user_name in database/table
                $sql_update = "UPDATE users SET password='$hashedNewPass' WHERE user_name='$loginUserName'";
                if ($conn->query($sql_update) === TRUE) {
                    echo ('<script>alert("Password has been updated successfully")</script>');
                } else {
                    echo "Error updating record: " . $conn->error;
                };
            }
        } else {
            echo ('<script>alert("Failed to reset. New password cannot be the same as the old one.")</script>');
        }
    }
    ?>

</body>

</html>