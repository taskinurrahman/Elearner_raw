<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("../classes/users.php");
include("userheader.php");
$users = new Users();


if (!isset($_SESSION['is_login'])) {
	//use header here 
	echo " <script>location.href = '../index.php'; </script> ";
}

$user_email = $_SESSION['loginemail'];
$result = $users->getuser($user_email);
$row = $result->fetch_assoc();


?>

<div class="col-sm-6 mt-5 mx-3 jumbotrom">
	<h3 class="text-center bg-dark text-white">User Information</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="course_if">User id </label>
			<input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $row['id'] ?>" readonly>
		</div>

		<div class="form-group">
			<label for="stu_name">Usernmae</label>
			<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter username" value="<?php echo $row['name'] ?>" readonly>
		</div>
		<div class="form-group">
			<label for="stu_email"> Email:</label>
			<input type="text" class="form-control" id="user_email" placeholder="Enter user email" name="user_email" value="<?php if (isset($row['email'])) {
																																																												echo $row['email'];
																																																											}
																																																											?>" readonly>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control" id="user_password" name="password" placeholder="Enter new password" value="">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="update_info" name="info_btn">Update Info</button>
		</div>

	</form>

</div>


<?php
include("userfooter.php");
?>