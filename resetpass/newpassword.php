<?php
include("stylecss.php");
require 'sql_connect.php';
$username = apache_request_headers()['x-remote-user'];

if (isset($_POST['reset'])) {
    $password = $_POST['newpass'];
    echo ("password is: $password <br>");

    $query = "SELECT `user_name`, `password` FROM `users` WHERE user_name='" . $username . "' and password='" . $password . "'";
    $result_query = mysqli_query($conn, $query);
    if ($result_query) {
        if (mysqli_num_rows($result_query)) {
            echo ("<script>confirm('You are logined successfully.')</script>");
        } else {
            echo ("<script>confirm('Failed to login, No such record: $username, $password') </script>");
        }
    } else {
        echo ("<script>alert('Failed to login, Not connected to db, $username, $password')</script>");
    }
} else {
    echo ("Submit failed");
}
?>

<?php
/* 
$headers = apache_request_headers();
------------
foreach ($headers as $key => $value) {
    echo "$key: $value <br />\n";
}
------------
$username = apache_request_headers()['x-remote-user'];
echo "<h4>GENISIS Login Username: $username</h4>";
*/
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset-Password</title>
</head>

<body class="std-body std-body-text">
    <div>
        <?php
        $username = apache_request_headers()['x-remote-user'];
        echo "<h4>GENISIS Login Username: $username</h4>";
        ?>
        <form action='/resetpass/newpassword.php' method="POST">
            <table align="center">
                <p align="center" id="reset-head">Reset Your Password</p>
                <tr>
                    <td class="enter-pass-row">Enter New Password</td>
                    <td class="enter-pass-row"><input type="password" id="newpass" name="newpass" placeholder="Type new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{14,32}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 14 to 32 characters" value='' required></td>
                </tr>
                <tr>
                    <td class="enter-pass-row">Confirm New Password</td>
                    <td class="enter-pass-row"><input type="password" id="confirmpass" name="confirmpass" placeholder="Repeat the password" value='' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right" class="enter-pass-row"><input type="submit" name="reset" value="Send" class="std-button"></td>
                </tr>
            </table>
        </form>
    </div>

    <div id="message1">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A capital (uppercase) letter</p>
        <p id="number" class="invalid">A number</p>
        <p id="minlength" class="invalid">Minimum 14 characters</p>
        <p id="maxlength" class="invalid">Maximum 32 characters</p>
        <p id="specials" class="invalid">A special character (!, @, #, $, %, &, *, ?)</p>
        <p id="not_oldpsw" class="invalid">Not the same as your old password</p>
        <p id="not_login" class="invalid">Not the same as your GENISIS login username</p>
    </div>
    <div id="message2">
        <h3>Password must be confirmed before the reset:</h3>
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
        var username = '<?php echo apache_request_headers()['x-remote-user']; ?>';
        // alert(username);

        // When the user clicks on the password field, show the message1 box
        myInput1.onfocus = function() {
            document.getElementById("message1").style.display = "block";
        }
        myInput2.onfocus = function() {
            document.getElementById("message2").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message1 box
        myInput1.onblur = function() {
            document.getElementById("message1").style.display = "none";
        }
        myInput2.onblur = function() {
            document.getElementById("message2").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput1.onkeyup = function() {
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
            var specialchars = /['!', '@', '#', '$', '%', '&', '*', '?']/g
            if (myInput1.value.match(specialchars)) {
                specials.classList.remove("invalid");
                specials.classList.add("valid");
            } else {
                specials.classList.remove("valid");
                specials.classList.add("invalid");
            }

            // Validate not-the-old-password
            if (myInput1.value !== "myOldPasword") {
                not_oldpsw.classList.remove("invalid");
                not_oldpsw.classList.add("valid");
            } else {
                not_oldpsw.classList.remove("valid");
                not_oldpsw.classList.add("invalid");
            }

            // Validate not-the-login-username
            if (myInput1.value !== username) {
                not_login.classList.remove("invalid");
                not_login.classList.add("valid");
            } else {
                not_login.classList.remove("valid");
                not_login.classList.add("invalid");
            }
        }

        myInput2.onkeyup = function() {
            // Repeat entering the password, confirmed the same one
            if (myInput1.value === myInput2.value) {
                confirmed.classList.remove("invalid");
                confirmed.classList.add("valid");
            } else {
                confirmed.classList.remove("valid");
                confirmed.classList.add("invalid");
            }
        }
    </script>

</body>

</html>