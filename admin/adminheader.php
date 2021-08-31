<?php
include('../db_connection.php');
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['is_ad_login'])) {
        echo " <script>location.href = '../index.php'; </script> ";
    }
}
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>ELearner</title>

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminarea.php">Elearner admin area</a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="adminarea.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courselist.php">
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="userlist.php">
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                Lessons
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>