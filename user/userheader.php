<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("../db_connection.php");

if (!isset($_SESSION['is_login'])) {
    echo " <script>location.href = '../index.php'; </script> ";
}

$user_email = $_SESSION['loginemail'];
$sql = "SELECT * from user WHERE email = '$user_email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!--custom css-->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>ELearner</title>

</head>

<body>
    <!-- top navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">ELearner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="navitem"><a href="../index.php" class="nav-link">Home</a></li>
                    <li class="navitem"><a href="../courses.php" class="nav-link">Courses</a></li>



                    <li class="navitem"><a href="profile.php" class="nav-link">Profile</a></li>
                    <li class="navitem"><a href="../logout.php" class="nav-link">Log Out</a></li>

                    <li class="navitem"><a href="#" class="nav-link">Contact</a></li>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="../images/default.png" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-user"></i>
                                <?php echo $row['name']; ?>
                            </a>


                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fab fa-accessible-icon"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mycourses.php">
                                <i class="fas fa-book"></i>
                                My courses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../courses.php">
                                <i class="fab fa-paypal"></i>
                                All courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>