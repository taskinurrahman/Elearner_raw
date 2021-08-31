<?php
include('adminheader.php');
require_once('../classes/courses.php');
require_once('../classes/users.php');
require_once('../classes/enroll.php');
$users = new Users();
$courses = new Courses();
$enroll = new Enroll();


//course count
$result = $courses->coursecount();
$row = $result->fetch_assoc();
$course_count = $row['total'];



///user count
$result = $users->usercount();
$row = $result->fetch_assoc();
$user_count = $row['total'];


//Enroll COUNT
$result = $enroll->enrollcount();
$row = $result->fetch_assoc();
$enroll_count = $row['total'];

mysqli_free_result($result);


?>

<div class="col-sm-9 col-md-10">
  <div class="row mx-5 text-center">
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Number of courses</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $course_count; ?>
          </h4>
          <a class="btn text-white" href="courselist.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Enrollment</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $enroll_count; ?>
          </h4>
          <a class="btn text-white" href="work.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">No. of users</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $user_count; ?>
          </h4>
          <a class="btn text-white" href="technician.php">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-9 col-md-10">

    <h3 style="text-align:center" class="bg-dark text-white p-2">List of Enrollment</h3>
    <?php
    $result = $enroll->getallenroll();
    if ($result->num_rows > 0) {
    ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Course ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">image</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr id="data-row">
              <td> <?php echo $row["id"]; ?> </th>
              <td><?php echo $row["course_id"]; ?></td>
              <td><?php echo $row["user_id"]; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else {
      echo '0 result';
    }
    ?>
  </div>
</div>
</div>
</div>

<?php
include('adminfooter.php');
?>