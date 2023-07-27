<?php
$host = 'phpmyadmin.test';
$username = 'root';
$password = '';
$database = 'team_project';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    echo "<script type='text/javascript'>alert('Terdapat kesalahan!');</script>";
}

mysqli_select_db($connection, $database);
