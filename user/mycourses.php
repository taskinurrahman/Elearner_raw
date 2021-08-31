<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("../classes/enroll.php");
require_once("userheader.php");
$enroll = new Enroll();


if (!isset($_SESSION['is_login'])) {
    echo " <script>location.href = '../index.php'; </script> ";
}

?>
<div class="col-sm-9 mt-5">
    <div class=" mx-5 mt-5 text-center">
        <!-- Table start -->
        <h3 class="bg-dark text-white">Courses</h3>
        <?php
        $result = $enroll->enrollbyuser();
        $rows = $result->num_rows;
        ?>
        <?php if ($rows > 0) : ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Course Id</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Author</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr id="data">
                            <td id="courseId">
                                <?php
                                echo $row['id']
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['course_name']
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['course_author']
                                ?>
                            </td>
                            <td>
                                <?php
                                echo '<button class = "btn btn-">ENROLLED</button>';
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php else : ?>
            <span> 0 result</span>
        <?php endif; ?>
    </div>
</div>
</div>


<?php
include("userfooter.php");
?>