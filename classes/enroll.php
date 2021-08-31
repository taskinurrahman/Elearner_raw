<?php
require_once('database.php');
class Enroll
{

    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function enrollcount()
    {
        $sql = "SELECT COUNT(course_id) as total
FROM enroll";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    function getallenroll()
    {
        $sql = "SELECT * FROM enroll";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    function enrollbyuser()
    {
        $sql = "SELECT courses.id ,courses.course_name, courses.course_author,courses.course_desc,courses.course_desc FROM enroll LEFT JOIN user ON user.id = enroll.user_id 
        LEFT JOIN courses ON courses.id = enroll.course_id";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    function courseenroll($course_id, $user_id)
    {
        $sql = "INSERT INTO enroll(course_id,user_id) VALUES( '$course_id','$user_id ')";
        $result = $this->db->conn->query($sql);
        return $result;
    }
}
