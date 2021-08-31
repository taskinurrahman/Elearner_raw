<!doctype html>
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/custom.css">
  <title>ELearner</title>
</head>

<body>
  <?php
  if (!isset($_SESSION)) {
    session_start();
  }

  ?>
  <!-- start navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href=''>ELearner</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
          <li class="navitem"><a href='' class="nav-link">Home</a></li>
          <li class="navitem"><a href="courses" class="nav-link">Courses</a></li>
          <?php

          if (isset($_SESSION['is_login'])) {
            echo '<li class="navitem"><a href="user/profile.php" class="nav-link">Profile</a</li>
            <li class="navitem"><a href="logout.php" class="nav-link">Log Out</a></li>';
          } else {
            echo '<li class="navitem"><a href="#"data-toggle="modal" data-target="#LoginModal" class="nav-link">Log in</a></li>
            <li class="navitem"><a href="#" data-toggle="modal" data-target="#RegModal" class="nav-link">Sign Up</a></li>';
          }
          ?>


          <li class="navitem"><a href="#" class="nav-link">Contact</a></li>
          <?php
          if (isset($_SESSION['is_ad_login'])) {
            if (!isset($_SESSION['is_login']))
              echo '<li class="navitem"><a href="../elearning/admin/adminarea.php" class="nav-link">admin area</a></li>';
          } else {
            echo '<li class="navitem"><a href="#"data-toggle="modal" data-target="#adminLoginModal" class="nav-link">admin login</a></li>';
          }
          ?>


        </ul>
      </div>
    </div>
  </nav>

  <!--User Registration start -->

  <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RegModalTitle">Sign up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="user-reg-form">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="Enter name">

            </div>
            <div class="form-group">
              <label for="useremail">Email address</label>
              <input type="email" name="useremail" class="form-control" id="useremail" aria-describedby="emailHelp" placeholder="Enter email">

            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" autocomplete="on" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="passwordConfirm">Confirm Password</label>
              <input type="password" name="passwordConfirm" autocomplete="on" class="form-control" id="passwordConfirm" placeholder="Confirm Password">
            </div>
            <div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>

          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!--Student Registration end --->


  <!--student login start-->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LoginModalTitle">Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="user-login">
            <div class="form-group">
              <label for="loginemail">Email address</label>
              <input type="email" name="loginemail" class="form-control" id="loginemail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="loginpassword">Password</label>
              <input type="password" name="loginpassword" class="form-control" id="loginpassword" placeholder="Password">
            </div>
            <div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" id="userlogin" class="btn btn-primary">Log in</button>
            </div>


          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!--admin  login start-->
  <div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModalTitle">Admin Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="adminloginemail">Email address</label>
              <input type="email" name="adminloginemail" class="form-control" id="adminloginemail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="adminloginpassword">Password</label>
              <input type="password" name="adminloginpassword" class="form-control" id="adminloginpassword" placeholder="Password">
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="adminlogin()" class="btn btn-primary" data-dismiss="modal">Log in</button>
        </div>
      </div>
    </div>
  </div>
  <!--admin login end-->
  <?php
  include('./footer.php');
  ?>