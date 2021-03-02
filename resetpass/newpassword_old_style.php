<?php

include("stylecss.php");

require 'sql_connect.php';
if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $password = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];
    $pat_lowercase = "/[a-z]/";
    $pat_uppercase = "/[A-Z]/";
    $pat_number = "/[0-9]/";
    $pat_special = "/[!,@,#,$,%,&,*,?]/";
    $oldpass = "my-Old-Password-by-DB";
    $login_name = "VA-LDAP-Login-username";

    echo ("username is: $username <br>");
    echo ("password is: $password <br>");
    echo ("confirmpass is: $confirmpass <br>");

    if ($password != $confirmpass) {
        echo ("<script>alert('Failed: New password must pass the confirmation.')</script>");
    } else if ($password === $oldpass) {
        echo ("<script>alert('Failed: New password must not be the same as your old password.')</script>");
    } else if ($password === $login_name) {
        echo ("<script>alert('Failed: New password must not be the same as your login username.')</script>");
    } else if (strlen($password) < 14) {
        echo ("<script>alert('Failed: New password must be at least 14 characters long.')</script>");
    } else if (strlen($password) > 32) {
        echo ("<script>alert('Failed: New password must be at most 32 characters long.')</script>");
    } else if (preg_match($pat_lowercase, $password) == 0) {
        echo ("<script>alert('Failed: New password must contain at least one lowercase characters.')</script>");
    } else if (preg_match($pat_uppercase, $password) == 0) {
        echo ("<script>alert('Failed: New password must contain at least one uppercase characters.')</script>");
    } else if (preg_match($pat_number, $password) == 0) {
        echo ("<script>alert('Failed: New password must contain at least one digital numbers.')</script>");
    } else if (preg_match($pat_special, $password) == 0) {
        echo ("<script>alert('Failed: New password must contain at least one special characters(!, @, #, $, %, &, *, ?).')</script>");
    } else {
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
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset-Password</title>
</head>

<body class="std-body std-body-text">
    <h3>Hello AABBCCDD, </h3>
    <p>Your password must conform to the following constraints:</p>
    <div id="cnstr-region">
        <ul>
            <li>Minimum length: 14</li>
            <li>Maximum length: 32</li>
            <li>Minimum number of lowercase characters: 1</li>
            <li>Minimum number of uppercase characters: 1</li>
            <li>Minimum number of digits: 1</li>
            <li>Minimum number of special characters: 1</li>
            <li>Your new password may not be the same as your old password</li>
            <li>Your new password may not be the same as your login</li>
        </ul>
    </div><br>
    <hr>

    <form method="POST" action='/resetpass/newpassword.php'>
        <table align="center">
            <p align="center" id="reset-head">Reset Your Password</p>
            <tr>
                <td>Username (for dev only)</td>
                <td><input type="text" name="username" placeholder="Your Username" value=""></td>
            </tr>
            <tr>
                <td id="enter-pass-row">Enter New Password</td>
                <td id="enter-pass-row"><input type="text" name="newpass" placeholder="Type password" value=""></td>
            </tr>
            <tr>
                <td id="enter-pass-row">Confirm New Password</td>
                <td id="enter-pass-row"><input type="text" name="confirmpass" placeholder="Repeat password" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td align="right" id="enter-pass-row"><input type="submit" name="reset" value="Send" class="std-button"></td>
            </tr>
        </table>
    </form>


</body>

</html>