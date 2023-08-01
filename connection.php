<?php

$dbhost = "localhost"; // database server name
$dbuser = "id21088793_unlockitdb_1"; // database username
$dbpass = "unlockITwebsite.group2"; // database password
$dbname = "id21088793_unlockitdb_1"; // database name

//create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>