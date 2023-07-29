<?php
include_once 'lib/Connection.php';

class Transaction
{
    public $db;

    public function __construct()
    {
        $this->db = new Connection();
    }

    public function index()
    {
        $query = "SELECT * FROM transactions";
        $result = $this->db->select($query);
        return $result;
    }

    public function countTransaction()
    {
        $query = "SELECT COUNT(*) AS count FROM transactions";
        $result = $this->db->sum($query);
        return $result;
    }

    public function totalTransaction()
    {
        $query = "SELECT SUM(total) AS total FROM transactions";
        $result = $this->db->sum($query);
        return $result;
    }

    public function addTransaction($data)
    {
        $user_data = json_decode($_SESSION['user_data'], true);
        $id = $user_data['id'];

        $nama_barang = $data['produk'];
        $kuantitas = $data['kuantitas'];
        $total = $data['total'];
        $user_id = $id;

        $query = "INSERT INTO transactions VALUES(null, '$nama_barang', '$kuantitas', '$total', '$user_id')";
        $result = $this->db->store($query);

        if ($result) {
            header('location: index.php');
        } else {
            echo $query;
        }
    }

    public function showTransaction($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateTransaction($data, $id)
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

    public function deleteTransaction($id)
    {

        $query = "DELETE FROM transactions WHERE id='$id'";
        $result = $this->db->delete($query);

        if ($result) {
            return true;
        } else {
            echo $query;
        }
    }
}
