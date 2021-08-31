<?php
require_once('adminheader.php');
require_once('../classes/users.php');
$users = new Users();
?>
<div class="col-sm-9 mt-5">

    <h3 style="text-align:center" class="bg-dark text-white p-2">List of Users</h3>
    <?php
    $result = $users->getallusers();
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"> <?php echo $row["id"]; ?> </th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <button type="submit" class="btn btn-info mr-3" name="view" value="view">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button type="submit" data-id="<?php echo $row["id"]; ?>" class="btn btn-secondary user-delete" id="delete" name="delete" value="delete">
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


<?php
//url route 
// $path = trim(($_SERVER['REQUEST_URI']), '/');
// $path = parse_url($path, PHP_URL_PATH);



// // $route = [
// //     'elearning' => 'index.php',

// //     'elearning/userlist.php' => 'admin/userlist.php'

// // ];
// echo $path;
// 
?>
<?php
include('adminfooter.php');
?>