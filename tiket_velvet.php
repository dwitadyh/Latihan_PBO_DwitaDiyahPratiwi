<?php
// TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Query untuk mengambil semua data tiket Velvet
    public static function ambilDataVelvet($db) {
        $query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, bantal_selimut_pack, layanan_butler 
                  FROM tabel_tiket 
                  WHERE jenis_studio = 'velvet'";
        
        $result = $db->conn->query($query);
        $daftarTiket = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftarTiket[] = new TiketVelvet(
                    $row['id_tiket'],
                    $row['nama_film'],
                    $row['jadwal_tayang'],
                    $row['jumlah_kursi'],
                    $row['harga_dasar_tiket'],
                    $row['bantal_selimut_pack'],
                    $row['layanan_butler']
                );
            }
        }
        return $daftarTiket;
    }

    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Paket Bantal/Selimut: " . $this->bantalSelimutPack . ", Layanan Butler: " . $this->layananButler;
    }
}
?>