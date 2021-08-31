<?php
require_once('database.php');
class Users
{

    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function checkmail($email)
    {
        $sql = "SELECT email from user where email = '$email'";
        $result = $this->db->conn->query($sql);
        $row = $result->num_rows;

        if ($result == true && $row == 0)
            return false; //no mail
        else
            return true; //email exist
    }

    function adduser($username, $email, $password)
    {

        $sql = "INSERT INTO user( name, email, password) VALUES 
        ( '$username ', '$email', '$password')";
        $this->db->conn->query($sql);
    }


    function getallusers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    function getuser($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' ";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    function userdelete($id)
    {
        $sql = "DELETE FROM user WHERE id ='" . $id . "'";
        $result = $this->db->conn->query($sql);

        return $result;
    }

    function userlogin($loginemail, $loginpassword)
    {
        $sql = "SELECT email,password FROM user where email = '$loginemail'";
        $result = $this->db->conn->query(($sql));
        $row = $result->num_rows;
        $login_row = $result->fetch_assoc();
        // mysqli_close($this->db->conn);
        if ($row && password_verify($loginpassword, $login_row['password']))
            return true;
        else
            return false;
    }

    function usercount()
    {
        $sql = "SELECT COUNT(id) as total
FROM user";
        $result = $this->db->conn->query($sql);
        // mysqli_free_result($result);
        return $result;
    }
}
