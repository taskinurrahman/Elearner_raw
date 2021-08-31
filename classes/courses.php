<?php
require_once('database.php');
class Courses
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function getallcourses()
    {
        $sql = "SELECT * FROM courses";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    function deletecourse($course_id)
    {
        $sql = "DELETE FROM courses WHERE id ='" . $course_id . "'";
        $result = $this->db->conn->query($sql);

        return $result;
    }
    function coursecount()
    {
        $sql = "SELECT COUNT(id) as total
FROM courses";
        $result = $this->db->conn->query($sql);
        // mysqli_free_result($result);
        return $result;
    }
    function addcourse($course_name, $course_desc, $course_author, $course_duration, $image_path)
    {
        $sql = $this->db->conn->prepare("INSERT INTO courses(course_name,course_desc,course_author,course_duration,course_image)VALUES (?,?,?,?,?)");
        $sql->bind_param("sssss", $course_name, $course_desc, $course_author, $course_duration, $image_path);
        // $sql->execute();
        if ($sql->execute())
            return true;
        else false;
    }
}
