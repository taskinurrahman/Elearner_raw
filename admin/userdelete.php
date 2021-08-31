
<?php
include('../classes/users.php');
$user = new Users();
$id = $_POST['id'];

if ($user->userdelete(($id))) {
    echo $id;
} else {
    echo "something went wrong" . $conn->error;
}
