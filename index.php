<?php
include('header.php');
include('db_connection.php');
?>

<!--End navigation -- >

    <1--start video background -->
<div class="container-fluid remove-vidmargin">
  <div class="vid-home">
    <video playsinline autoplay muted loop>
      <source src="video/Library.mp4">
    </video>

  </div>
  <?php
  if (!isset($_SESSION['is_login'])) {
    echo '<div class="vid-content">
        <h1>Welcome to ELearner</h1>
        <button class="btn btn-danger" data-toggle="modal" data-target="#RegModal">Get started</button>
        </div>';
  }
  ?>
</div>
<!--End video background -->

<!--start popular courses -->

<main role="main">

  <div class="container">
    <h1 class="jumbotron-heading">Popular Courses</h1>
  </div>


  <?php ///get user id from database
  if (isset($_SESSION['is_login'])) {
    $user_mail = $_SESSION['loginemail'];
    $sql = "SELECT id FROM user WHERE email = '$user_mail' ";
    $result = $conn->query($sql);
    if ($conn->query($sql) == TRUE) {
      $row = $result->fetch_assoc();
    } else {
      die($conn->error);
    }

    $user_id = $row['id'];
  } ?>



  <!--start popular courses -->

  <main role="main">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <?php
          $sql = "SELECT * from courses";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) { ?>
            <!--get course information -->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo $row['course_image']; ?>" alt="image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['course_name']; ?></h5>
                  <p class="card-text" style="overflow:hidden;"><?php echo $row['course_desc']; ?></p>
                  <div class="card-footer">
                    <p class="card-text d-inline">by <b> <?php echo $row['course_author']; ?> </b>
                    </p>
                    <button class="enroll-btn btn btn-info text-white font-weight-bolder float-right">Enroll</button>
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


  $routes = [
    '' => 'index.php',
    'courses' => 'elearning/courses.php',
    'admin/adminarea' => 'elearning/admin/adminarea',
  ];

  if (array_key_exists($path, $routes)) {
    require $routes[$path];
  }




  ?>



  <?php
  include('footer.php');
  ?>