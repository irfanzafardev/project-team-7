<?php
include 'connection.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {

        // $nama_barang = $_POST['nama_barang'];
        // $harga = $_POST['harga'];
        // $satuan = $_POST['satuan'];
        // $keterangan = $_POST['keterangan'];
        // $user_id = 1;

        // $query = "INSERT INTO products VALUES(null, '$nama_barang', '$harga', '$satuan', '$keterangan', '$user_id')";
        // $sql = mysqli_query($connection, $query);

        // if ($sql) {
        //     header('location: index.php');
        // } else {
        //     echo $query;
        // }

    } elseif ($_POST['action'] == 'edit') {
        echo "Edit data <a href='index.php'></a>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM products WHERE id = '$id';";
    $sql = mysqli_query($connection, $query);

    if ($sql) {
        header('location: index.php');
    } else {
        echo $query;
    }
}
