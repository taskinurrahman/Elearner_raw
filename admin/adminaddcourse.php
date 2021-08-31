<?php
require_once('../classes/courses.php');

$courses = new Courses();
///////course add operation 


if (!empty($_POST["course_name"]) && !empty($_POST["course_desc"]) && !empty($_FILES['course_img']) && !empty($_POST["course_author"]) && !empty($_POST["course_duration"])) {

    $course_name = $_POST["course_name"];
    $course_desc = $_POST["course_desc"];
    $course_author = $_POST["course_author"];
    $course_duration = $_POST["course_duration"];
    //image upload
    $course_image = $_FILES['course_img']['name'];
    $course_image_temp = $_FILES['course_img']['tmp_name'];
    $img_folder = '../images/courseimg/' . $course_image;
    $image_path = 'images/courseimg/' . $course_image;
    move_uploaded_file($course_image_temp, $img_folder);


    if ($courses->addcourse($course_name, $course_desc, $course_author, $course_duration, $image_path)) {
        echo "ok";
    } else {
        die($conn->error);
        echo "failed";
    }
} else {
    echo "no";
}
