<?php
/*
$servername = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$dbname = "reset_password";
$conn = mysqli_connect($servername, $mysql_user, $mysql_pass, $dbname);
if (!$conn) {
    echo ("Error on Connection to MySQL-DB");
}

// --- Access LDAP Login Username from the headers -------------
$loginUserName = apache_request_headers()['x-remote-user'];
if (!$loginUserName) {
    echo ("Failed to get Login Username");
}

// --- Fetch Password from MySQL by the login-username ---------------
$myOldPassword = 'noPasswordStored';

$sql_get = "SELECT password FROM users WHERE user_name ='$loginUserName'";
$result = $conn->query($sql_get);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $myOldPassword = " " . $row["password"] . "";
    }
    $myOldPassword = TRIM($myOldPassword);  // REQUIRED
}
*/
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toLDAP</title>
</head>

<body>

</body>

</html>