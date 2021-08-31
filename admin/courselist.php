<?php
include_once('adminheader.php');
require_once('../classes/courses.php');
$courses = new Courses();
?>
<div class="col-sm-9 mt-5">

    <h3 style="text-align:center" class="bg-dark text-white p-2">List of Courses</h3>
    <?php
    $result = $courses->getallcourses();
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr id="data-row">
                        <td> <?php echo $row["id"]; ?> </th>
                        <td><?php echo $row["course_name"]; ?></td>
                        <td><?php echo $row["course_author"]; ?></td>
                        <td><?php echo $row["course_image"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-info mr-3" name="view" value="view">

                            </button></a>
                            <button data-id="<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary course-delete" id="delete" name="delete" value="delete">
                                <i class="far fa-trash-alt"></i>
                            </button>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo '0 result';
    }
    ?>
</div>

<div>
    <a class="btn btn-danger box" href="addcourse.php">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
<?php
include('adminfooter.php');
?>