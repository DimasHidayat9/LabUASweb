<?php
class Config {
    protected $db;
    public function __construct() {
        // Sesuaikan dengan database Anda
        $this->db = new mysqli("localhost", "root", "", "db_penjualan_kendaraan");
        if ($this->db->connect_error) die("Koneksi Gagal: " . $this->db->connect_error);
    }
}