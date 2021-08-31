<?php
class Database
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "elearner";
    public $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        if ($this->conn->connect_error) {
            die("database Connection failed\n" . $this->conn->connect_error);
        }
    }
}
