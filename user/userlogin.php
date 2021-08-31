<?php
include('../classes/users.php');
$users = new Users();
if (!isset($_SESSION)) {
    session_start();
}
//log in verification 
if (!empty($_POST['loginemail']) && !empty($_POST['loginpassword'])) {
    $loginemail = $_POST['loginemail'];
    $loginpassword = $_POST['loginpassword'];

    if ($users->userlogin($loginemail, $loginpassword)) {

        $_SESSION['is_login'] = true;
        $_SESSION['loginemail'] = $loginemail;
        echo json_decode(1);
    } else {
        echo json_decode(0);
    }
} else {
    echo "no";
}
