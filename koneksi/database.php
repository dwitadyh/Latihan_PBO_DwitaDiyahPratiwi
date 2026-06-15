<?php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username phpMyAdmin Anda
    private $password = "";     // Sesuaikan dengan password phpMyAdmin Anda
    private $db_name = "nama_database_anda"; // GANTI dengan nama database Anda
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}
?>