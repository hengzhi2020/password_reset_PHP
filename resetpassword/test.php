<?php
include("stylecss.php");
require 'sql_connect.php';

$loginUserName = (apache_request_headers()['x-remote-user']);
echo '<script>alert($loginUserName)</script>';

$query = "SELECT `user_name` FROM `users` WHERE user_name='" . $loginUserName . "'";
$result_query = mysqli_query($conn, $query);
if ($result_query) {
    if (mysqli_num_rows($result_query)) {
        echo ($result_query);
    }
}
// echo ("password - Input: $password <br>");
// $hash = password_hash($password, PASSWORD_DEFAULT);
// echo ("password - Hashed: $hash <br>");
