<?php
include('header.php');
if (!isset($_SESSION)) {
  session_start();
}

require_once('classes/users.php');
require_once('classes/database.php');
$user = new Users();
$db = new Database();
// if (!isset($_SESSION['is_login'])) {
//   echo " <script>location.href = 'index.php'; </script> ";
// }

// ger user id from user table
if (isset($_SESSION['is_login'])) {
  $user_mail =  $_SESSION['loginemail'];

  if ($user->getuser($user_mail)) {
    $row = $user->getuser($user_mail)->fetch_assoc();
  } else {
    die($conn->error);
  }
  $user_id = $row['id'];
}
?>


<!--start popular courses -->

<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Courses</h1>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SELECT * from courses";
        $result = $db->conn->query($sql);

        while ($row = $result->fetch_assoc()) { ?>

          <!--get course information -->
          <?php if (isset($_SESSION['is_login'])) {
            $course_id = $row['id'];
            $sql = "SELECT * FROM enroll WHERE user_id = '$user_id' and course_id = '$course_id'";
            $result2 = $db->conn->query($sql);
            $row1 = $result2->num_rows;
          }
          ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="<?php echo $row['course_image']; ?>" alt="image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['course_name']; ?></h5>
                <p class="card-text" style="overflow:hidden;"><?php echo $row['course_desc']; ?></p>
                <div class="card-footer">
                  <button data-id="[<?php echo $course_id ?>,<?php echo $user_id ?>]" class="enroll-btn btn btn-info text-white font-weight-bolder float-right">
                    <?php

                    if (isset($_SESSION['is_login'])) {
                      if ($row1 > 0) {
                        echo "Enrolled";
                      } else {
                        echo "Enroll";
                      }
                    } else {
                      echo "Enroll";
                    } ?></button>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
  </div>





</main>

<!--- end popular courses -->




<?php
$path = trim($_SERVER['REQUEST_URI'], '/');
parse_url($path, PHP_URL_PATH);
echo $path;
print_r($_SERVER);

include('./footer.php');
?>