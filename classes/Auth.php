<?php
include_once 'lib/Connection.php';

class Auth
{
    public $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function login($request)
    {
        $email = $request['email'];
        $password = $request['password'];

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $this->db->login($query);

        if ($result) {
            $user_id = $this->db->query("SELECT id FROM users WHERE email='$email' AND password='$password'")->fetch_assoc()['id'];
            session_start();
            $_SESSION['user_id'] = $user_id;
            $query = "SELECT * FROM users WHERE id='$user_id'";
            $result = $this->db->query($query);
            $user_data = $result->fetch_assoc();
            $_SESSION['user_data'] = json_encode($user_data);
            header('location: index.php');
        } else {
            header('location: login.php');
        }
    }

    public function register($request)
    {
        $nama = $request['nama_lengkap'];
        $email = $request['email'];
        $password = $request['password'];

        $query = "INSERT INTO users VALUES(null, '$nama', '$email', '$password')";
        $result = $this->db->register($query);

        if ($result) {
            header('location: login.php');
        } else {
            header('location: register.php');
        }
    }

    public function logout()
    {
        session_start();

        unset($_SESSION['user_data']);

        header('location: login.php');
    }
}
