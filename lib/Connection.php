<?php
include_once 'config/config.php';

class Connection
{
    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;

    public $link;
    public $error;

    public function __construct()
    {
        $this->dbConnect();
    }

    public function dbConnect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->link) {
            $this->error = 'Connection failed!';
            return false;
        }
    }

    public function login($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }

        return false;
    }

    public function register($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function query($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if (mysqli_num_rows($result) != 0) {
            return $result;
        }

        return false;
    }

    public function select($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }

        return $result;
    }

    public function sum($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if ($result) {
            return $result;
        }

        return $result;
    }

    public function store($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function update($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function delete($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);

        if ($result) {
            return $result;
        }

        return false;
    }
}
