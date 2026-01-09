<?php
require_once 'Config.php';

class KendaraanModel extends Config {
    // Fungsi Login
    public function login($u, $p) {
        $q = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
        return $this->db->query($q)->fetch_assoc();
    }

    // MEMPERBAIKI ERROR image_4ccc00.png
    public function getAllKendaraan($keyword = null, $limit = 6, $offset = 0) {
        $q = "SELECT * FROM kendaraan";
        if ($keyword) $q .= " WHERE merk LIKE '%$keyword%' OR model LIKE '%$keyword%'";
        $q .= " LIMIT $limit OFFSET $offset";
        $result = $this->db->query($q);
        $rows = [];
        while ($row = $result->fetch_assoc()) { $rows[] = $row; }
        return $rows;
    }

    // MEMPERBAIKI ERROR image_4ccfc1.png
    public function countKendaraan($keyword = null) {
        $q = "SELECT COUNT(*) as total FROM kendaraan";
        if ($keyword) $q .= " WHERE merk LIKE '%$keyword%' OR model LIKE '%$keyword%'";
        $res = $this->db->query($q)->fetch_assoc();
        return $res['total'];
    }

    // MEMPERBAIKI ERROR image_4cc4bf.png
    public function getById($id) {
        $id = $this->db->real_escape_string($id);
        $q = "SELECT * FROM kendaraan WHERE id = '$id'";
        return $this->db->query($q)->fetch_assoc();
    }

    // Fungsi Admin
    public function getAll() {
        return $this->db->query("SELECT * FROM kendaraan");
    }

    public function tambah($d) {
        $namaGambar = 'default.jpg';
        if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
            $namaGambar = time() . '_' . $_FILES['gambar']['name'];
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'assets/img/' . $namaGambar);
        }
        $q = "INSERT INTO kendaraan (merk, model, tipe, tahun, harga, stok, gambar) 
              VALUES ('{$d['merk']}', '{$d['model']}', '{$d['tipe']}', '{$d['tahun']}', '{$d['harga']}', '{$d['stok']}', '$namaGambar')";
        return $this->db->query($q);
    }

    public function hapus($id) {
        return $this->db->query("DELETE FROM kendaraan WHERE id = $id");
    }
}