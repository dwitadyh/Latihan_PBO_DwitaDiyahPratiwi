<?php

class Database {
    private $host = "localhost";
    private $username = "root"; 
    private $password = "";     
    private $db_name = "db_latihan_pbo_ti1c_dwitadiyahpratiwi"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}
?>