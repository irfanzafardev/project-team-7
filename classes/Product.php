<?php
include_once 'lib/Connection.php';

class Product
{
    public $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function index()
    {
        $query = "SELECT * FROM products";
        $result = $this->db->select($query);
        return $result;
    }


    public function countProduct()
    {
        $query = "SELECT COUNT(*) AS count FROM products";
        $result = $this->db->sum($query);
        return $result;
    }

    public function addProduct($data)
    {
        $nama_barang = $data['nama_barang'];
        $harga = $data['harga'];
        $satuan = $data['satuan'];
        $keterangan = $data['keterangan'];
        $user_id = 1;

        $query = "INSERT INTO products VALUES(null, '$nama_barang', '$harga', '$satuan', '$keterangan', '$user_id')";
        $result = $this->db->store($query);

        if ($result) {
            header('location: index.php');
        } else {
            echo $query;
        }
    }

    public function showProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateProduct($data, $id)
    {
        $nama_barang = $data['nama_barang'];
        $harga = $data['harga'];
        $satuan = $data['satuan'];
        $keterangan = $data['keterangan'];
        $user_id = 1;

        $query = "UPDATE products SET nama_barang='$nama_barang', harga='$harga', satuan='$satuan', keterangan='$keterangan', user_id='$user_id' WHERE id='$id'";
        $result = $this->db->update($query);

        if ($result) {
            header('location: index.php');
        } else {
            echo $query;
        }
    }

    public function deleteProduct($id)
    {

        $query = "DELETE FROM products WHERE id='$id'";
        $result = $this->db->delete($query);

        if ($result) {
            return true;
        } else {
            echo $query;
        }
    }
}
