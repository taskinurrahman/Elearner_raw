<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "elearner";

// Create connection
$conn = new mysqli($db_host,$db_user, $db_password,$db_name);

// Check connection
if ($conn-> connect_error) {
    die("database Connection failed\n". $conn->connect_error);
}
// else
// echo "database Connected successfully\n";
