<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../classes/Users.php');
$user = new Users();
//user registration 

if (!empty($_POST['username']) &&  !empty($_POST['email']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($user->checkmail($email) == false) {
        $user->adduser($username, $email, $password);
        echo $user->checkmail($email);
    } else {

        echo $user->checkmail($email);
    }
} else {
    echo "no";
}
