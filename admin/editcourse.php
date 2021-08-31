<?php
include('adminheader.php');

if (!isset($_SESSION))
    session_start();
?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Edit Course</h3>
    <form class="form-addcourse" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course description</label>
            <textarea type="text" class="form-control" id="course_desc" name="course_desc" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_img">Course image</label>
            <input type="file" class="form-control" id="course_img" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="course_subnmitbtn" name="course_subnmitbtn">Submit</button>
            <a href="courselist.php" class="btn btn-secondary">Close</a>
        </div>
        <div id="alert-msg" role="alert" style="display:none"></div>'

    </form>
</div>

<?php
include('adminfooter.php');
?>