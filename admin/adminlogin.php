<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../db_connection.php');


if (isset($_POST['adloginemail']) && isset($_POST['adloginpassword'])) {
    $adloginemail = $_POST['adloginemail'];
    $adloginpassword = $_POST['adloginpassword'];

    $sql = "SELECT admin_email,admin_password FROM admin where admin_email = '$adloginemail' AND admin_password = '$adloginpassword'";

    $result = $conn->query($sql);
    $row = $result->num_rows;
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }

    if ($row > 0) {
        $_SESSION['is_ad_login'] = true;
        $_SESSION['adloginemail'] = $adloginemail;
        echo $row;
    } else {
        echo $row;
    }
}
