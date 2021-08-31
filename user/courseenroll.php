<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("../classes/enroll.php");
$enroll = new Enroll();

if (isset($_POST['course_id']) && isset($_POST['user_id'])) {
    $course_id = $_POST['course_id'];
    $user_id = $_POST['user_id'];



    // $result = $conn->query($sql);
    if ($enroll->courseenroll($course_id, $user_id)) {

        echo ("inserted");
    } else {
        echo ("failed");
    }
}
