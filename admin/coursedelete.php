
<?php
require_once('../classes/courses.php');
$courses = new Courses();

$id = $_POST['id'];

if ($courses->deletecourse($id)) {
    echo $id;
} else {
    echo "something went wrong" . $conn->error;
}
