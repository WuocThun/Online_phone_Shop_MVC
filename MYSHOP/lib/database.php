<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../config/config.php');
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;
    public function __construct()
    {
        $this->connectDB();
    }
    private function connectDB()
    {
        $this->link = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if ($this->link) {
            $this->error = "connect fail" . $this->link->connect_error;
            return false;
        }
    }
    //select or read dâta
    public function select($querry)
    {
        $result = $this->link->query($querry) or
            die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    // insert data
    public function insert($querry)
    {
        $insert_row = $this->link->query($querry) or
            die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }
    //update data
    public function update($querry)
    {
        $update_row = $this->link->query($querry)
            or
            die($this->link->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }
    //delete data
    public function delete($querry)
    {
        $delete_row = $this->link->query($querry)
            or
            die($this->link->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}
